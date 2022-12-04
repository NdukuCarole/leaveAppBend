<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


/* Auth Routes */
Route::group(['prefix' => 'auth'], function (){

    Route::post('register', [RegisterController::class,'register']);

    Route::post('login',[LoginController::class,'login']);

    Route::post('verify-otp', [RegisterController::class,'verify']);
    Route::post('resend-otp', [RegisterController::class,'generateOtp']);

    Route::post('forgot-password', [RegisterController::class,'verify']);
    Route::post('reset-password', [PasswordResetController::class,'resetPassword']);

    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::get('/logout', [LoginController::class,'logout']);
        Route::get('/user', 'LoginController@user');
        Route::get('/refresh', 'LoginController@refresh');
    });
});
