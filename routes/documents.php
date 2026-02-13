<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Document Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    // Document Types CRUD
    Route::resource('document-types', DocumentTypeController::class);

    // Documents
    Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});
