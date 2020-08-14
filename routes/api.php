<?php

use Illuminate\Http\Request;


Route::post('/v1/auth/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('auth.login');
Route::post('/v1/auth/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('auth.register');

//Api Check Middleware Guard

Route::middleware('api.check')->group(function () {
    Route::get('v1/auth/me', [\App\Http\Controllers\Api\Auth\AuthController::class, 'me'])->name('auth.me');
});
