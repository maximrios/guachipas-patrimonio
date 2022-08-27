<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;

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
    
    Route::get('assignments/list', [AssignmentController::class, 'list'])->name('assignments.list');
    Route::get('assignments/print/{assignment}', [AssignmentController::class, 'print'])->name('assignments.print');
    Route::post('assignments/untracked', [AssignmentController::class, 'untracked'])->name('assignments.untracked');
    Route::get('assignments/approve/{assignment}', [AssignmentController::class, 'approve'])->name('assignments.approve');

    Route::resource('assignments', AssignmentController::class);

});