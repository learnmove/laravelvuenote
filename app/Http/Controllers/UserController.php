<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserController extends Controller
{
    //
    public function register(Request $rq){
        User::create($rq->all());
        return response()->json(['register ok']);
    }
    public function login(Request $rq){
        $credential=$rq->only('email','password');
        if(!$token=JWTAuth::attempt($credential)){
            return response()->json(['error User'],404);
        }else{
            return response()->json(['token'=>$token]);
        }
    }

}
