<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RestingPlaceController;
use App\Http\Controllers\admin\WishListController;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index']);

Route::post('/users/store', [UserController::class, 'store'])
    ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);

Route::get('/restingPlaces', [RestingPlaceController::class, 'index']);

Route::post('/restingPlaces/store', [RestingPlaceController::class, 'store'])
    ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);

Route::get('/users/{id}/wish_list', [WishListController::class, 'getWishList']);

Route::post('/users/{id}/wish_list/add', [WishListController::class, 'addToWishList'])
    ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);


