<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication routes
Route::group(['prefix'=>'auth'], function (){
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware(['auth:sanctum']);
    Route::post('forget-password', [\App\Http\Controllers\Api\AuthController::class, 'forgetPassword']);
    Route::get('resend-verification', [\App\Http\Controllers\Api\AuthController::class, 'resendVerification'])->middleware(['auth:sanctum']);
    Route::get('verify', [\App\Http\Controllers\Api\AuthController::class, 'verify']);
    Route::get('forget-password', [\App\Http\Controllers\Api\AuthController::class, 'forgetPassword']);
    Route::get('set-password', [\App\Http\Controllers\Api\AuthController::class, 'setPassword']);
});

