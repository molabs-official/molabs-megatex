<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\MegaTex;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use MegaTex;

    /**
     * This function is used for login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $token = null;
        $success = false;
        $this->message = 'Invalid Email';
        $user = User::where('email', '=', $request->input('email'))->first();
        if (!empty($user)) {
            $this->message = 'Invalid Password';
            $result = Hash::check($request->input('password'), $user->password);
            if ($result) {
                $token = $user->createToken('MyApp')->accessToken;
                $success = true;
                $this->message = 'Login Successfully';
            }
            $cartData = $request->input('cartData');
            $userId = $user->id;
            if (!empty($cartData)) {
                foreach ($cartData as $row) {
                    if (!empty($row['id'])) {
                        $obj = UserCart::where(['user_id' => $userId, 'product_id' => $row['id']])->first();
                        if (empty($obj)) {
                            $obj = new UserCart();
                        }
                        $obj->product_id = $row['id'];
                        $obj->user_id = $userId;
                        $obj->quantity = $row['qty'];
                        $obj->save();
                    }
                }
            }
        }

        return response()->json(['message' => $this->message, 'user' => $user, 'success' => $success, 'token' => $token])->header('authorization', 'Bearer ' . $token);
    }

    /**
     * @param Request $request sineup
     * @return \Illuminate\Http\JsonResponse
     */
    public function SignUp(Request $request)
    {
        $data = $request->all();
        $validations = [
            'first_name' => 'required',
            'email' => 'sometimes|required|email|unique:users',
            'password' => 'required'
        ];
        $validator = Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
            $obj = [];
            $token = '';
            $this->success = false;
            $code = 400;
        } else {
            $obj = new User();
            $obj->first_name = $request->input('first_name');
            $obj->last_name = $request->input('last_name');
            $obj->name = $request->input('first_name') . ' ' . $request->input('last_name');
            $obj->email = $request->input('email');
            $obj->user_type = 1;
            $obj->password = Hash::make($request->input('password'));
            $obj->save();
            $token = $obj->createToken('MyApp')->accessToken;
            $this->message = 'User created successfully';
            $this->success = true;
            $userId = $obj->id;
            $cartData = $request->input('cartData');
            if (!empty($cartData)) {
                foreach ($cartData as $row) {
                    if (!empty($row['id'])) {
                        $cart = UserCart::where(['user_id' => $userId, 'product_id' => $row['id']])->first();
                        if (empty($obj)) {
                            $cart = new UserCart();
                        }
                        $cart->product_id = $row['id'];
                        $cart->user_id = $userId;
                        $cart->quantity = $row['qty'];
                        $cart->save();
                    }
                }
            }
            $code = 200;
        }

        return response()->json(['success' => $this->success, 'message' => $this->message, 'user' => $obj, 'token' => $token], $code)->header('authorization', 'Bearer ' . $token);
    }

    /**
     * this is used to logout user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->success();
    }

    /**
     * this is used to check user type
     *
     * @param Request $request
     * @return AuthController
     */
    public function checkType()
    {
        $userId = loginId();
        $user = User::find($userId);

        return response()->json();
    }

    /**
     * refresh token
     *
     * @param Request $request
     * @return AuthController
     */
    public function refresh()
    {
        return response()->json(['message'=> 'Success'])->header('authorization', 'Bearer ' . auth()->user()->createToken('MyApp')->accessToken);
    }

    /**
     * refresh token
     *
     * @param Request $request
     * @return AuthController
     */
    public function user()
    {
        return response()->json(auth()->user());
    }
}
