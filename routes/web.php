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
use App\Http\Controllers\User\AssociationController ;
use App\Http\Controllers\User\RentController;
use App\Http\Controllers\User\OnlinePaymentController;
use App\Http\Controllers\Admin\AdminElectricityController;
use App\Http\Controllers\Admin\AdminWaterController;
use App\Http\Controllers\Admin\AdminRentController;
use App\Http\Controllers\Admin\AdminAssociationController;
use App\Http\Controllers\Admin\AdminDashboardController;


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

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/electricity', [AdminElectricityController::class, 'index'])->name('admin.electricity');

        Route::post('/electricity', [AdminElectricityController::class, 'store'])->name('admin.electricity.store');

        Route::patch('/electricity', [AdminElectricityController::class, 'update'])->name('admin.electricity.update');

        Route::delete('/electricity', [AdminElectricityController::class, 'destroy'])->name('admin.electricity.destroy');

        Route::get('/water', [AdminWaterController::class, 'index'])->name('admin.water');

        Route::post('/water', [AdminWaterController::class, 'store'])->name('admin.water.store');

        Route::patch('/water', [AdminWaterController::class, 'update'])->name('admin.water.update');

        Route::delete('/water', [AdminWaterController::class, 'destroy'])->name('admin.water.destroy');

        Route::get('/rent', [AdminRentController::class, 'index'])->name('admin.rent');

        Route::post('/rent', [AdminRentController::class, 'store'])->name('admin.rent.store');

        Route::patch('/rent', [AdminRentController::class, 'update'])->name('admin.rent.update');

        Route::delete('/rent', [AdminRentController::class, 'destroy'])->name('admin.rent.destroy');

        Route::get('/association', [AdminAssociationController::class, 'index'])->name('admin.association');

        Route::post('/association', [AdminAssociationController::class, 'store'])->name('admin.association.store');

        Route::patch('/association', [AdminAssociationController::class, 'update'])->name('admin.association.update');

        Route::delete('/association', [AdminAssociationController::class, 'destroy'])->name('admin.association.destroy');


    });
});
