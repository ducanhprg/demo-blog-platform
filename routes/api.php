<?php

use App\Http\Controllers\Api\ApiLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Route Group
Route::prefix('v1')->group(function () {
    // Public Routes
    Route::post('login', [ApiLoginController::class, 'login']);

    // Protected Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', function (Request $request) {
            return $request->user();
        });
        Route::post('logout', [ApiLoginController::class, 'logout']);
    });
});
