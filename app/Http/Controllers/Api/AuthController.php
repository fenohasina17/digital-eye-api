<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\ApiController;
use Validator;


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

        $user = User::create($validatedData);
        $user->access_token = $user->createToken('authToken')->accessToken;
        return $this->showOne($user, 200);
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
        $user->access_token = auth()->user()->createToken('authToken')->accessToken;
        return $this->showOne($user, 200);

    }



}
