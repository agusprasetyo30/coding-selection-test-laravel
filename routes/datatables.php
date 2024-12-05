<?php

use App\Http\Controllers\Datatables\ItemCategoryDatatablesController;
use App\Http\Controllers\Datatables\ItemDatatablesController;
use App\Http\Controllers\datatables\ItemSalesDatatablesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/datatables')->as('datatables.')->namespace('Datatables')->group(function() {
	Route::get('/item-category', [ItemCategoryDatatablesController::class, 'datalist'])
		->name('item-category');

	Route::get('/item', [ItemDatatablesController::class, 'datalist'])
		->name('item');

	Route::prefix('/sales')->as('sales.')->group(function() {
		Route::get('/item', [ItemSalesDatatablesController::class, 'datalist'])
			->name('item');

		Route::get('/laporan-penjualan', [ItemSalesDatatablesController::class, 'laporanPenjualanDatalist'])
			->name('laporan-penjualan');
	});
});