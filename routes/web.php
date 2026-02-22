<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'show'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'permission:dashboard.view'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'permission:master.manage'])->group(function () {
    Route::get('/master/users/', [UserController::class, 'index'])->name('master');
    Route::get('/master/users/create', [UserController::class, 'create'])->name('master.create');
    Route::post('/master/users/', [UserController::class, 'store'])->name('master.store');
});
