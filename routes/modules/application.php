<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApplicationController;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


/* Auth Routes */
Route::group(['prefix' => 'app'], function (){

    Route::post('save', [ApplicationController::class,'insert']);

});
