<?php

use Illuminate\Support\Facades\Route;

Route::get('/ap', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});