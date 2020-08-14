<?php

use Illuminate\Http\Request;


Route::post('/v1/auth/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('auth.login');
Route::post('/v1/auth/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('auth.register');

//Api Check Middleware Guard

Route::middleware('api.check')->group(function () {
    Route::get('v1/auth/me', [\App\Http\Controllers\Api\Auth\AuthController::class, 'me'])->name('auth.me');



    Route::get('v1/categories', [\App\Http\Controllers\Api\Category\CategoryController::class, 'index'])->name('category.index');
    Route::get('v1/categories/{id}', [\App\Http\Controllers\Api\Category\CategoryController::class, 'show'])->name('category.index');

    //todo bu silinecek
    Route::post('v1/categories', [\App\Http\Controllers\Api\Category\CategoryController::class, 'store'])->name('category.store');


    Route::get('v1/songs', [\App\Http\Controllers\Api\Song\SongController::class, 'index'])->name('song.index');
    Route::get('v1/songs/{id}', [\App\Http\Controllers\Api\Song\SongController::class, 'show'])->name('song.index');

    //todo bu silinecek
    Route::post('v1/songs', [\App\Http\Controllers\Api\Song\SongController::class, 'store'])->name('song.store');
    Route::post('v1/songs/add-favorites', [\App\Http\Controllers\Api\Song\SongController::class, 'addFavorite'])->name('song.add.favorite');

    Route::get('v1/favorites', [\App\Http\Controllers\Api\Song\SongController::class, 'index'])->name('favorites.index');
    Route::post('v1/favorites/add', [\App\Http\Controllers\Api\Song\SongController::class, 'store'])->name('favorites.store');
    Route::delete('v1/favorites/{id}', [\App\Http\Controllers\Api\Song\SongController::class, 'store'])->name('favorites.store');



});
