<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

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

    Route::get('organizations/list', [OrganizationController::class, 'list'])->name('organizations.list');
    Route::resource('organizations', OrganizationController::class);

});