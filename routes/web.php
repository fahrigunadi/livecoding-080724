<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\LoginController;

Route::redirect('/', '/cars');

Route::middleware(['auth'])->group(function () {
    Route::resource('/cars', CarController::class)->middleware('can:user');

    Route::view('user', 'user')->name('user')->middleware('can:admin');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'store']);

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.store');
