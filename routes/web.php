<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::redirect('/', '/dashboard', 301);

    Route::get('/login', [LoginController::class, "showLoginForm"])->name('login');
    Route::post('/login', [LoginController::class,"login"])->name('login');
    Route::post('/logout', [LoginController::class, "logout"])->name('logout');

// Route::middleware(['auth'])->group(function () {
    require('datatables.php');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('item-category', ItemCategoryController::class);
    Route::resource('item', ItemController::class);
// });