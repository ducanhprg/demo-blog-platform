<?php

use App\Http\Controllers\Web\WebLoginController;
use Illuminate\Support\Facades\Route;

// Web Authentication Routes
Route::get('login', [WebLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [WebLoginController::class, 'login']);
Route::post('logout', [WebLoginController::class, 'logout'])->name('logout');
