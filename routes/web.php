<?php

use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminSignupController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\ElectricityController;
use App\Http\Controllers\User\WaterController;
use App\Http\Controllers\User\AssociationController;
use App\Http\Controllers\User\RentController;
use App\Http\Controllers\User\OnlinePaymentController;
use App\Http\Controllers\Admin\AdminElectricityController;
use App\Http\Controllers\Admin\AdminWaterController;
use App\Http\Controllers\Admin\AssocTransactionController;
use App\Http\Controllers\Admin\AdminRentController;

// Account Type
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

    Route::get('/electricity', [ElectricityController::Class,'index'])->name('user.electricity')->middleware('auth');

    Route::get('/water', [WaterController::Class,'index'])->name('user.water')->middleware('auth');

    Route::get('/association', [AssociationController::Class,'index'])->name('user.association')->middleware('auth');

    Route::post('/Online/pay/{id}', [OnlinePaymentController::class, 'pay'])->name('pay');
    Route::post('/Online/cash/{id}', [OnlinePaymentController::class, 'cash'])->name('cash');

    Route::get('help', function () {
        return view('user.help-and-support');
    })->name('user.help')->middleware('auth');

    Route::get('settings', function () {
        return view('user.settings');
    })->name('user.settings')->middleware('auth');

    Route::get('/rent', [RentController::Class,'index'])->name('user.rent')->middleware('auth');

    Route::patch('/settings/profile', [ProfileController::class, 'update'])->name('user.settings.updateProfile')->middleware('auth');

    Route::patch('/settings/password', [PasswordController::class, 'update'])->name('user.settings.updatePassword')->middleware('auth');

});

// Admin Routes
Route::prefix('admin')->group(function () {

    Route::get('/sign-up', [AdminSignupController::class, 'create'])->name('admin.sign-up');

    Route::post('/sign-up', [AdminSignupController::class, 'store'])->name('admin.store');

    Route::get('/log-in', [AdminLoginController::class, 'showLogin'])->name('admin.log-in');

    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');

    // 2. Protected Routes (Must be logged in as Admin)
    Route::middleware(['auth:admin'])->group(function () {

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');

        Route::get('/electricity', [AdminElectricityController::class, 'index'])->name('admin.electricity');

        Route::get('/water', [AdminWaterController::class, 'index'])->name('admin.water');

        Route::get('/rent', [AdminRentController::class, 'index'])->name('admin.rent');

        Route::resource('association', AssocTransactionController::class)->names('admin.association');
    });
});
