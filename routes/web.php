<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::view('/', 'index')->name('index');

Route::view('apropos', 'about')->name('about');
