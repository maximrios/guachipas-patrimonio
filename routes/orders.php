<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

    Route::resource('orders', OrderController::class);
    Route::get('orders/print/{order}', [OrderController::class, 'print'])->name('orders.print');
    Route::get('orders/approve/{order}', [OrderController::class, 'approve'])->name('orders.approve');

});

