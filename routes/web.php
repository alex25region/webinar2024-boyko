<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\CacheController;


Route::middleware(['guest'])->group(function () {
    Route::get('redirect/{provider}', [SocialNetworkController::class, 'redirect'])->name('redirect');
    Route::get('callback/{provider}', [SocialNetworkController::class, 'callback'])->name('callback');
});



Route::middleware('auth')->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');

    Route::middleware('hasAdmin')->prefix('admin')->group(function () {

        Route::resource('users', UserController::class)->names('users');
        Route::resource('projects', ProjectController::class)->names('projects');

        Route::group(['prefix' => 'projects/{project}'], function () {

            Route::resource('goals', GoalController::class)->names('goals');
            Route::group(['prefix' => 'goals/{goal}'], function () {
                Route::resource('steps', StepController::class)->names('steps');
            });
        });
    });
});

Route::get('cache', CacheController::class)->name('cache');




