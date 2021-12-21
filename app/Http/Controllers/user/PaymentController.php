<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Stripe;
use DB;
use App\Traits\MegaTex;
use Laravel\Cashier\Cashier;
class PaymentController extends Controller
{
    use MegaTex;

    /**
     * this is used to stripe Payment
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function stripePayment(Request $request)
    {
        $userId = loginId();
        $shippingDetail = json_decode($request->input('shipping'));
        $cartItem = json_decode($request->input('cart'));
        $cartItem = (isset($cartItem) ? $cartItem : []);
        $paymentMethod = $request->input('paymentMethod');
        $user = User::find($userId);
        if (!empty($cartItem)) {
            $productIds = [];
            $qty = [];
            foreach ($cartItem as $row) {
                $productIds[] = $row->id;
                $qty[$row->id] = $row->qty;
            }
            $price = Product::select('price', 'id')->whereIn('id', $productIds)->get()->toArray();
            if (!empty($price)) {
                $price = array_column($price, null, 'id');
                ksort($price);
                ksort($qty);
                $totalAmount = 0;
                foreach ($price as $key => $row) {
                    $totalAmount += ($row['price'] * $qty[$key]);
                }
                $totalAmount += 11 + 4; // shipping and tax amount ;
                try {
                    $amount = $totalAmount * 100;
                    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                    $user->createOrGetStripeCustomer();
                    $user->updateDefaultPaymentMethod($paymentMethod);
                    $charge = $user->charge($amount, $paymentMethod);
                    $chargeData = $charge->charges->data[0];
                    $cardType = $chargeData['payment_method_details']->card->brand;

                    $obj = new Billing();
                    $obj->charge_id = $chargeData['id'];
                    $obj->stripe_customer = $charge->customer;
                    $obj->name = $shippingDetail->name;
                    $obj->phone = $shippingDetail->phone;
                    $obj->address = $shippingDetail->address;
                    $obj->business_name = $shippingDetail->business_name;
                    $obj->shipping_method = $shippingDetail->post_type;
                    $obj->card_type = $cardType;
                    $obj->save();
                    /**
                     * save Order
                     */
                    $arr = [];
                    foreach ($productIds as $key => $row) {
                        $arr[$key]['billing_id'] = $obj->id;
                        $arr[$key]['product_id'] = $row;
                        $arr[$key]['user_id'] = $userId;
                    }
                    Order::insert($arr);
                    $this->success = true;
                    $this->message = 'Payment succeed';
                    DB::commit();
                } catch (Exception $e) {
                    $this->message = $e->getMessage();
                    $this->success = false;
                    DB::rollback();
                }
            } else {
                $this->message = 'Item price is zero';
            }
        } else {
            $this->message = 'No item found in cart';
        }

        return $this->success(['success' => $this->success, 'message' => $this->message]);
    }

    /**
     * This is used to get stripe publishable key
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStripeKey()
    {
        $user = User::find(loginId());
        $stripe = env('PUBLISHABLE_KEY');
        $intent = $user->createSetupIntent();

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $stripe, 'intent' => $intent]);
    }
}
