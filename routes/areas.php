<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::group(['middleware' => 'auth'], function () {

    Route::get('areas/create/{area}', [AreaController::class, 'create'])->name('areas.create');
    Route::resource('areas', AreaController::class, ['except' => ['create']]);

});
