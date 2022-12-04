<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $user = User::whereEmail($request->email)->first();
        $credentials=$request->all();
        if (Auth::attempt($credentials)) {
            return response()->json([
                "status"=>'success',
                "message" => "Successfull",
                "user"=>$user,
                "token" => $user->createToken("app")->plainTextToken
                
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
