<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function register(Request $request) {

        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {

            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => "User register successfully"
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request) {

        $email_address = $request->email;
        $password =$request->password;


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // $user = Auth::user();
            $user = $request->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => "User login successfully"
            ];

            return response()->json($response, 200);
        }else{
            if (empty($password) && empty($email_address)) {
                $message = 'Please enter your detail.';
            } else if (empty($password)) {
                $message = 'Please enter your password.';
            }else if (empty($email_address) ) {
                $message = 'Please enter your email address.';
            }else{
                $message = 'Your Account not found please signup for new account';
            }

            return response()->json(['data'=>$message, 400]);
        }

    }
}
