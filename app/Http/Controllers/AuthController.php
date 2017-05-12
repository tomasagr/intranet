<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Intranet\User;

class AuthController extends Controller
{
    public function auth(Request $request) 
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $user = User::where('username', $request->username)->first();

        if (is_null($user)) {
            return $this->notFound('User not found');
        }

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return $this->notAllowed();
         }

         return $this->success('Success', ['user' => $user, 'token' => $token]);
    }

    
    public function me() 
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        return $this->success('Success', ['user' => $user, 'token' => $token]);
    }
}
