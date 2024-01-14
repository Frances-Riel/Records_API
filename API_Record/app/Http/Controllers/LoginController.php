<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function See() {
        return view('welcome');
    }
/*
    public function WEBlogin(Request $request) {
        $http = new Client;

        $email = $request->email;
        $password = $request->password;

        $response = $http->post('http://localhost:8000/api/login',
        [
            'header'=>[
                'Autorization'=>'Bearer'.session()->get('token.access_token')
            ],
            'query'=> [
                'email'=>$email,
                'password'=>$password
            ]
        ]);
        $result = json_decode((string)$response->getBody(),true);
        return dd($result);
        return view('welcome');

    }

    public function login(Request $request) {
        if (Auth::attempt(["email" => $request ->email, "password" => $request -> password])) {
            $user = Auth::user();
            return response([
                "message"=>"Login Successfully",
                "success"=>"true",
                "token"=>$user->createToken($user->email)->plainTextToken]
                ,200);
        }
        else {
            return response(["message"=>"Invalid Email or Password", "success"=>"false"],401);
        }
    }
    */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('AuthToken')->accessToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
