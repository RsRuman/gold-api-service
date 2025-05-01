<?php

use App\Http\Controllers\Api\v1\Auth\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::group(['prefix' => 'v1/', 'middleware' => 'api'], function () {
    Route::post('sign-up', [AuthenticationController::class, 'signUp']);
    Route::post('login', [AuthenticationController::class, 'login']);
});

// Private routes
Route::group(['prefix' => 'v1/', 'middleware' => ['auth:sanctum']], function () {
    // Logout
    Route::post('logout', [AuthenticationController::class, 'logout']);
});
