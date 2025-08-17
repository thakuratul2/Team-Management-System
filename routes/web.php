<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\CheckAuthenticated;
use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\UserController;


Route::middleware([CheckAuthenticated::class])
     ->group(function () {
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/account', [AccountController::class, 'index'])->name('account.index');
Route::post('/account', [AccountController::class, 'store'])->name('account.store');
});


// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(CheckAuthenticated::class)->name('dashboard');

// User Management routes
Route::get('/employees', [UserController::class, 'index'])->middleware(CheckAuthenticated::class)->name('employees.index');
Route::post('/employees', [UserController::class, 'store'])->middleware(CheckAuthenticated::class)->name('employees.store');
