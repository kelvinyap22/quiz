<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\KnowledgeController;
use App\Http\Controllers\Admin\InformasiController;


Route::get('/', [KnowledgeController::class, 'index'])->name('public.index');
Route::get('/knowledge/{informasi}', [KnowledgeController::class, 'show'])->name('public.show');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('informasi', InformasiController::class);
});