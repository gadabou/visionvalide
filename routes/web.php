<?php

use Illuminate\Support\Facades\Route;





Route::view('/', 'index')->name('index');

Route::view('apropos', 'about')->name('about');
