<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CmsHeroController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SekbidController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('academic-years', AcademicYearController::class)->except(['show', 'edit', 'update']);
    Route::resource('document-categories', DocumentCategoryController::class)->except(['show', 'edit', 'update']);
    Route::resource('documents', DocumentController::class)->except(['show', 'edit', 'update']);

    Route::get('/cms/hero', [CmsHeroController::class, 'edit'])->name('cms.hero.edit');
    Route::put('/cms/hero', [CmsHeroController::class, 'update'])->name('cms.hero.update');
    Route::resource('cms-anggota', AnggotaController::class)->except(['show', 'edit', 'update']);
    
    // Route CMS Sekbid (Baru)
    Route::resource('cms-sekbid', SekbidController::class)->except(['show', 'edit', 'update']);
});

require __DIR__.'/auth.php';