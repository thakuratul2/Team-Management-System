<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');