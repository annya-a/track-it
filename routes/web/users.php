<?php

use App\Web\Controllers\LoginController;
use App\Web\Controllers\LogoutController;
use App\Web\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [LogoutController::class, 'destroy'])
        ->name('logout');
});
