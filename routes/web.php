<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');

Route::resource('users', UserController::class)->names('users');
Route::resource('projects', ProjectController::class)->names('projects');

Route::group(['prefix' => 'projects/{project}'], function () {


    Route::group(['prefix' => 'goals/{goal}'], function () {
        Route::resource('steps', GoalController::class)->names('steps');
    });

    Route::resource('goals', GoalController::class)->names('goals');

//    Route::prefix('goals/{goal}')->resource('steps', GoalController::class)->names('steps');
});

