<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\CheckAuthenticated;


Route::middleware([CheckAuthenticated::class])
     ->group(function () {
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});


// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(CheckAuthenticated::class)->name('dashboard');