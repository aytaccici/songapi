<?php

use Illuminate\Http\Request;


Route::post('/v1/auth/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('auth.login');
Route::post('/v1/auth/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('auth.register');
Route::get('v1/application/check', [\App\Http\Controllers\Api\Application\ApplicationController::class, 'checkUpdate'])->name('application.check');

//Api Check Middleware Guard

Route::middleware('api.check')->group(function () {
    Route::get('v1/auth/me', [\App\Http\Controllers\Api\Auth\AuthController::class, 'me'])->name('auth.me');

    Route::get('v1/categories', [\App\Http\Controllers\Api\Category\CategoryController::class, 'index'])->name('category.index');
    Route::get('v1/categories/{id}', [\App\Http\Controllers\Api\Category\CategoryController::class, 'show'])->name('category.index');


    Route::get('v1/songs', [\App\Http\Controllers\Api\Song\SongController::class, 'index'])->name('song.index');
    Route::get('v1/songs/{id}', [\App\Http\Controllers\Api\Song\SongController::class, 'show'])->name('song.index');
    Route::post('v1/songs', [\App\Http\Controllers\Api\Song\SongController::class, 'store'])->name('song.store');
    Route::post('v1/songs/add-favorite', [\App\Http\Controllers\Api\Song\SongController::class, 'addFavorite'])->name('song.add.favorite');
    Route::delete('v1/songs/delete-favorite', [\App\Http\Controllers\Api\Song\SongController::class, 'deleteFavorite'])->name('song.delete.favorite');

    Route::get('v1/favorites', [\App\Http\Controllers\Api\Favorite\FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('v1/favorites/add-favorite', [\App\Http\Controllers\Api\Favorite\FavoriteController::class, 'addFavorite'])->name('favorite.add');
    Route::delete('v1/favorites/delete-favorite', [\App\Http\Controllers\Api\Favorite\FavoriteController::class, 'deleteFavorite'])->name('favorite.delete');

});
