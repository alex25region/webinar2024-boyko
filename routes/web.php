<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('dashboard');
//});

Route::view('/', 'dashboard')->name('dashboard');

Route::resource('users', UserController::class)->names('users');
