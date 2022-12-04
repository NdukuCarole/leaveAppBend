<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        //get credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials=$request->all();
        if (Auth::attempt($credentials)) {
            return response()->json([
                "status"=>'success',
                "message" => "Successfull",
                
            ]);
        }else{
            return response()->json([
                "status"=>'error', 
                "message" => "Wrong Credentials",
                
            ]);
            
        }
    }
    public function logout(): JsonResponse
    {
        try {
            $token = Auth::user()->token();
            $token->revoke();
            return $this->success([],'You have been successfully logged out!');
        } catch (Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
