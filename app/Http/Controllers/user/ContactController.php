<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * This is used to save info from contact us
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact(Request $request)
    {
        $userId = loginId();
        $data = $request->all();
        $validations = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ];
        $validator = \Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
            $this->success = false;
        } else {

            $obj = new ContactUs();
            $obj->name = $request->input('name');
            $obj->phone = $request->input('phone');
            $obj->email = $request->input('email');
            $obj->comment = $request->input('comment');;
            $obj->user_id = $userId;
            $obj->save();
            $this->success = true;
            $this->message = 'Information submitted successfully';
        }
        Mail::to(mailToEnv())->send(new ContactUsMail($obj , $obj->token));

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
}
