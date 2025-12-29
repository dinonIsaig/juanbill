<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('account-type');
})->name('account-type');

// User Routes
Route::prefix('user')->group(function () {
    Route::get('sign-up', function () {
        return view('user.sign-up');
    })->name('user.sign-up');

    Route::get('dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('log-in', function () {
        return view('user.log-in');
    })->name('user.log-in');

    route::get('electricity', function () {
        return view('user.electricity');
    })->name('user.electricity');

    route::get('water', function () {
        return view('user.water');
    })->name('user.water');

});

// Admin Routes
Route::prefix('admin')->group(function () {

    Route::get('sign-up', function () {
        return view('admin.sign-up');
    })->name('admin.sign-up');

    Route::get('log-in', function () {
        return view('admin.log-in');
    })->name('admin.log-in');

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
