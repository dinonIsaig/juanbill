<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PasswordController;


Route::get('/', function () {
    return view('account-type');
})->name('account-type');

// User Routes
Route::prefix('user')->group(function () {

    Route::get('/sign-up', [SignupController::class, 'showRegister'])->name('user.sign-up');

    Route::post('/sign-up', [SignupController::class, 'store'])->name('user.store');

    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('user.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('user.log-out')->middleware('auth');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

    route::get('electricity', function () {
        return view('user.electricity');
    })->name('user.electricity');

    route::get('water', function () {
        return view('user.water');
    })->name('user.water');

    route::get('association', function () {
        return view('user.association');
    })->name('user.association');

    route::get('settings', function () {
        return view('user.settings');
    })->name('user.settings');

    Route::patch('/settings/profile', [ProfileController::class, 'update'])->name('user.settings.updateProfile')->middleware('auth');

    Route::patch('/settings/password', [PasswordController::class, 'update'])->name('user.settings.updatePassword')->middleware('auth');

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
