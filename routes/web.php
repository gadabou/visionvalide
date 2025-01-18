<?php

use Illuminate\Support\Facades\Route;





Route::view('/', 'index')->name('index');

Route::view('apropos', 'about')->name('about');
Route::view('equipe', 'team')->name('team');
Route::view('appointment', 'appointment')->name('appointment');
Route::view('service', 'service')->name('service');
Route::view('activite', 'activite')->name('activite');
Route::view('store', 'store')->name('store');



Route::view('contact', 'contact')->name('contact');
Route::get('boutique', [HomeController::class, 'products'])->name('shop');
Route::get('produit/{product}/details', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('categorie/{category}/details', [HomeController::class, 'categoryDetail'])->name('category.detail');
Route::post('newsletter', [HomeController::class, 'newsletter'])->name('newsletter');
