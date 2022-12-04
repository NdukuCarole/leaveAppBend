<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    //
    public function resetPassword(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            if (Auth::user()->id == $user->id) {
                if ($request->new_password && Auth::user()->id == $user->id) {
                    $request->validate([
                        'current_password' => ['required', new MatchOldPassword],
                        'new_password' => ['required'],
                        'new_confirm_password' => ['required','same:new_password'],
                    ]);

                    User::find(Auth::id())->update(['password'=> Hash::make($request->input('new_password'))]);
                }
                $user->update($request->all());
                return $this->success($user,'You have successfully updated your user details');
            } else {
                return $this->error('You dont have permission to update this user');
            }
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
    public function forgotPassword(Request $request)
    {
     $user = User::whereEmail($request->email)->first();
     $otp = rand(1000, 9999);
     $user->otp = $otp;
     $user->update();
     Notification::route('mail',  $request["email"])->notify(new sendOtp($otp));
   
    }
}
