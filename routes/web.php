<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('academic-years', AcademicYearController::class)->except(['show', 'edit', 'update']);
    Route::resource('document-categories', DocumentCategoryController::class)->except(['show', 'edit', 'update']);
    
    // Route Manajemen Dokumen (Baru)
    Route::resource('documents', DocumentController::class)->except(['show', 'edit', 'update']);
});

require __DIR__.'/auth.php';