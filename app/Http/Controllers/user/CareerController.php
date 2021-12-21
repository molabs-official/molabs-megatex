<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\CareerMail;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Traits\MegaTex;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    use MegaTex;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = loginId();
        $fileName = '';
        $data = $request->all();
        $validations = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'desired_position' => 'required',
            'document' => 'required',
        ];
        $validator = \Validator::make($data, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
            $this->success = false;
        } else {
            if (!empty($request->input('document'))) {
                if ($request->get('document')) {
                    $document = $request->get('document');
                    $data = base64_decode(preg_replace('/^data:image\/\w+;base64,/i', '', $document));
                    $fileName = createImageUniqueName() . '.' . explode('/', explode(':', substr($document, 0, strpos($document, ';')))[1])[1];
                    $destinationPath = public_path('Career/Documents'); // user image path
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }
                    $tempFile = $destinationPath . '/' . $fileName;
                    file_put_contents($tempFile, $data);
                }
            }

            $obj = new Career();
            $obj->name = $request->input('name');
            $obj->phone = $request->input('phone');
            $obj->email = $request->input('email');
            $obj->desired_position = $request->input('desired_position');
            $obj->document = $fileName;
            $obj->user_id = $userId;
            $obj->save();
            $this->success = true;
            $this->message = 'Information submitted successfully';
            Mail::to(mailToEnv())->send(new CareerMail($obj , $obj->token));
        }

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
