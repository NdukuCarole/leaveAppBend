<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    // public function login(Request $request): JsonResponse
    // {
    //     try {
    //         //get credentials
    //         $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required',
    //         ]);
    //         $credentials=$request->all();
    //         $user=User::where('email',$credentials['email'])->first();
    //         // AUTHENTICATE
    //         if (!$user) return $this->error('Invalid credentials', Response::HTTP_UNAUTHORIZED);
    //         if ($user->user_type == 'SUPER_ADMIN') {
    //             return $this->authorizeUser($user,$credentials);
    //         } else {
    //             return $user->user_type == $credentials['user_type'] || $user->user_type == $credentials['user_admin'] 
    //             ? $this->authorizeUser($user,$credentials) 
    //             : $this->error('Invalid credentials', Response::HTTP_UNAUTHORIZED);
    //         }
    //     }catch (\Exception $exception){
    //         return $this->error($exception->getMessage());
    //     }
    // }
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
