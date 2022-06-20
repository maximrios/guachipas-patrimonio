<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderProductController;

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
    
    Route::get('orders/{order}/create', [OrderProductController::class, 'create'])->name('orderProducts.create');
    Route::resource('orderProducts', OrderProductController::class)->except(['create']);

});