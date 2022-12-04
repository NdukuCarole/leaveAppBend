<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Notifications\sendOtp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    
    
    
    public function register(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
        
        $user = new User();
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->name = 'Add Name';
        $otp = Str::random(4);
        $user->otp = $otp;
        Notification::route('mail',  $request["email"])->notify(new sendOtp($otp));
        $user->save();
       
        return response()->json([
            "message" => "check Otp in the mail",
            
        ]);
             
    }
    
}
