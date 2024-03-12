<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::group(['middleware' => 'auth'], function () {

    Route::get('inventories/list', [InventoryController::class, 'list'])->name('inventories.list');
    Route::get('inventories/search', [InventoryController::class, 'search'])->name('inventories.search');
    Route::get('inventories/print', [InventoryController::class, 'print'])->name('inventories.print');
    Route::get('inventories/code/{inventory}', [InventoryController::class, 'code'])->name('inventories.code');
    Route::get('inventories/order/{order}', [InventoryController::class, 'order'])->name('inventories.order');
    Route::post('inventories/check', [InventoryController::class, 'check'])->name('inventories.check');
    Route::resource('inventories', InventoryController::class);

    Route::post('inventories/export', [InventoryController::class, 'export'])->name('inventories.export');
//});
