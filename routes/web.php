<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemSalesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::redirect('/', '/dashboard', 301);

    Route::get('/login', [LoginController::class, "showLoginForm"])->name('login');
    Route::post('/login', [LoginController::class,"login"]);
    Route::post('/logout', [LoginController::class, "logout"])->name('logout');

// Route::middleware(['auth'])->group(function () {
    require('datatables.php');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Master
    Route::resource('item-category', ItemCategoryController::class);
    Route::resource('item', ItemController::class);

    // Transaction / Sales
    Route::prefix('/sales')->as('sales.')->group(function () {
        Route::get('/item/laporan-penjualan', [ItemSalesController::class, 'laporanPenjualan'])->name('item.laporan-penjualan');
        Route::get('/item/monitoring-stock', [ItemSalesController::class, 'monitoringStock'])->name('item.monitoring-stock');
        
        Route::resource('item', ItemSalesController::class)->only('index', 'create', 'store');
    });


    // Soal 2
    Route::get('/soal-2-process', [DashboardController::class, 'soal2View'])->name('soal2-process');
    Route::post('/soal-2-process', [DashboardController::class, 'soal2Process']);

// });