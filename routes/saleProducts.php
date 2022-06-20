<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleProductController;

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
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('sales/{sale}/create', [SaleProductController::class, 'create'])->name('saleProducts.create');
    Route::resource('saleProducts', SaleProductController::class)->except(['create']);

});
