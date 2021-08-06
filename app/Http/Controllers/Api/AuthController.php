<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\ApiController;
use Validator;
use Mail;


class AuthController extends ApiController
{
    public function register(Request $request)
    {

        $validatedData = Validator::make(
            $request->all(),
            array(
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'is_employee' => 'required',
            'is_parent' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $validatedData = $request->all();
        $validatedData["is_admin"] = 0;
        $validatedData['password'] = bcrypt($request->password);
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $file = $request->file('image');
                $destinationPath = public_path('/uploads');
                //$extension = $file->getClientOriginalExtension('logo');
                $image = $file->getClientOriginalName('image');
                $image = rand().$image;
                $request->file('image')->move($destinationPath, $image);
                $validatedData['image'] = $image;

            }
        }
        $six_digit_random_number = random_int(100000, 999999);
        $validatedData['code'] = $six_digit_random_number;
        $user = User::create($validatedData);
        $email = $request->email; // or $email = $tokenData->email;
        $settings = Setting::pluck('value', 'name')->all();
        $link  = url('email-verified?email='.$email);

        $data = array(
            'name' => $request->name,
            'user_email' => $request->email,
            'subject' => "Email Verification",
            'msg' => "Your Verification Code. <br> <b>$six_digit_random_number</b>",
            'email' => isset($settings['email']) ? $settings['email'] : 'chuckm@mobilevideosystems.net',
            'logo' => isset($settings['admin_logo']) ? $settings['admin_logo'] : '',
            'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'Digital Eye',
        );
        Mail::send('emails.reset-password', $data, function ($message) use ($data) {
            $message->to($data['user_email'], '')
                ->from($data['email'], $data['site_title'])
                ->subject('Reset Password');
        });
        return $this->successMessage('Account Created Successfully. Check Your email for verification',200);
//        $user->access_token = $user->createToken('authToken')->accessToken;
//        return $this->showOne($user, 200);
    }

    public function sendEmail(Request $request)
    {
        $validatedData= Validator::make(
            $request->all(),
            array(
                'email' => 'email|required',
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $loginData = $request->all();
        $user = User::where("email",$request->email)->first();
        if(!$user) {
            return $this->errorResponse('Email No Found',200);
        }else{
            $email = $request->email; // or $email = $tokenData->email;
            $settings = Setting::pluck('value', 'name')->all();
            $link  = url('email-verified?email='.$email);
            $six_digit_random_number = random_int(100000, 999999);
            $data = array(
                'name' => $request->name,
                'user_email' => $request->email,
                'subject' => "Email Verification",
                'msg' => "Your Verification Code. <br> <b>$six_digit_random_number</b>",
                'email' => isset($settings['email']) ? $settings['email'] : 'chuckm@mobilevideosystems.net',
                'logo' => isset($settings['admin_logo']) ? $settings['admin_logo'] : '',
                'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'Digital Eye',
            );
            Mail::send('emails.reset-password', $data, function ($message) use ($data) {
                $message->to($data['user_email'], '')
                    ->from($data['email'], $data['site_title'])
                    ->subject('Reset Password');
            });
            $user->code = $six_digit_random_number;
            $user->save();
            return $this->successMessage('Check Your email',200);
        }


    }

    public function login(Request $request)
    {
        $validatedData= Validator::make(
            $request->all(),
            array(
            'email' => 'email|required',
            'password' => 'required'
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $loginData = $request->all();

        if(!auth()->attempt($loginData)) {
            return $this->errorResponse('Invalid Credentials',200);
        }
        $user = auth()->user();
        if(!$user->email_verified_at) {
            return $this->errorResponse('Sorry! Verify your email First',200);
        }
        $user->access_token = auth()->user()->createToken('authToken')->accessToken;
        return $this->showOne($user, 200);

    }

    public function confirmCode(Request $request)
    {
        $validatedData= Validator::make(
            $request->all(),
            array(
            'email' => 'email|required',
            'code' => 'required'
            ));
        if ($validatedData->fails())
        {
            $error = $validatedData->errors()->first();
            return $this->errorResponse($error, 200);
        }
        $loginData = $request->all();
        $user = User::where([["email",$request->email],["code",$request->code]])->first();
        if(!$user) {
            return $this->errorResponse('Invalid Code',200);
        }
        $mytime = Carbon::now();
        $user->email_verified_at = $mytime;
        $user->save();
//        $user = auth()->user();

        $user->access_token = $user->createToken('authToken')->accessToken;
        return $this->showOne($user, 200);

    }



}
