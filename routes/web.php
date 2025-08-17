<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\CheckAuthenticated;
use App\Http\Controllers\Dashboard\AccountController;


Route::middleware([CheckAuthenticated::class])
     ->group(function () {
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/account', [AccountController::class, 'index'])->name('account.index');

    Route::post('/account', [AccountController::class, 'store'])->name('account.store');

    Route::put('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');
});


// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(CheckAuthenticated::class)->name('dashboard');