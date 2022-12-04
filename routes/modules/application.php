<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\ApplicationController;


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/


/* Auth Routes */
Route::group(['prefix' => 'app'], function (){

    Route::post('save', [ApplicationController::class,'store']);

});
