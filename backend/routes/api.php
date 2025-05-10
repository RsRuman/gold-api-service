<?php

use App\Http\Controllers\Api\v1\Auth\AuthenticationController;
use App\Http\Controllers\Api\v1\User\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::group(['prefix' => 'v1/', 'middleware' => 'api'], function () {
    Route::post('/sign-up', [AuthenticationController::class, 'signUp']);
    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::post('/stripe/webhook', [SubscriptionController::class, 'webhook']);
});

// Private routes
Route::group(['prefix' => 'v1/', 'middleware' => ['auth:sanctum']], function () {
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);

    Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
    Route::get('/subscribe/{id}', [SubscriptionController::class, 'getUserSubscription']);
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');
    Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
});
