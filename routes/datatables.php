<?php

use App\Http\Controllers\Datatables\ItemCategoryDatatablesController;
use App\Http\Controllers\Datatables\ItemDatatablesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/datatables')->as('datatables.')->namespace('Datatables')->group(function() {
	Route::get('/item-category', [ItemCategoryDatatablesController::class, 'datalist'])
		->name('item-category');

	Route::get('/item', [ItemDatatablesController::class, 'datalist'])
		->name('item');
});