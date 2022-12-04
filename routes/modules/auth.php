<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


/* Auth Routes */
Route::group(['prefix' => 'auth'], function (){

    Route::post('register', [RegisterController::class,'register']);

    Route::post('login', 'LoginController@login');

    Route::post('verify-otp', 'VerificationController@verifyOtp');
    Route::post('resend-otp', 'VerificationController@resendOtp');

    Route::post('forgot-password', 'PasswordResetController@forgotPassword');
    Route::post('reset-password', 'PasswordResetController@resetPassword');

    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::get('/logout', 'LoginController@logout');
        Route::get('/user', 'LoginController@user');
        Route::get('/refresh', 'LoginController@refresh');
    });
});
