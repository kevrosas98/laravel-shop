<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response=[
                'user'=>$user,
                'token'=>$token
            ];
            return response($response,201);
        }else{
            return response(null,401);
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->logout();
        return [
            'message'=>'Logged out'
        ];
    }
}
