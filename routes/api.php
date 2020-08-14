<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/v1/auth/login', function () {})->name('login');
Route::post('/v1/auth/register',  [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('auth.register');

Route::middleware('api.check')->group(function () {
    Route::get('v1/auth/me',  [\App\Http\Controllers\Api\Auth\AuthController::class, 'me'])->name('auth.me');
});
