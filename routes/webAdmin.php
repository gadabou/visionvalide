<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PublicityController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::view('login', 'admin.auth.login')->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

// Admin routes
Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => 'admin',], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // Route::view('/', 'admin.dashboard');
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('publicities', PublicityController::class)->except(['show']);
    Route::resource('images', ImageController::class)->only(['index', 'destroy']);
});
