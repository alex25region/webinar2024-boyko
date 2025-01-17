<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');

Route::resource('users', UserController::class)->names('users');
Route::resource('projects', ProjectController::class)->names('projects');
