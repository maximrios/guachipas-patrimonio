<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentProductController;

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
    
    Route::get('assignments/{assignment}/untracked', [AssignmentProductController::class, 'untracked'])->name('assignmentProducts.untracked');
    Route::get('assignments/{assignment}/create', [AssignmentProductController::class, 'create'])->name('assignmentProducts.create');

    Route::post('assignmentProducts/storeInventory', [AssignmentProductController::class, 'storeInventory'])->name('assignmentProducts.storeInventory');


    Route::resource('assignmentProducts', AssignmentProductController::class)->except(['create']);

});