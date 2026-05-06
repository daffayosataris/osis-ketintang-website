<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CmsHeroController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SekbidController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/halaman/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/bidang/{id}', [HomeController::class, 'showSekbid'])->name('sekbid.show');

Route::get('/dashboard', function () {
    $totalAnggota = \App\Models\Anggota::count() + \App\Models\SekbidMember::count();
    $totalSekbid = \App\Models\Sekbid::count();
    $totalEvent = \App\Models\Event::count();
    $totalPages = \App\Models\Page::count();
    
    return view('dashboard', compact('totalAnggota', 'totalSekbid', 'totalEvent', 'totalPages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // KODE BERUBAH: Membuka kunci rute Arsip agar bisa di-Edit
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);
    Route::resource('document-categories', DocumentCategoryController::class)->except(['show']);
    Route::resource('documents', DocumentController::class)->except(['show']);

    Route::get('/cms/hero', [CmsHeroController::class, 'edit'])->name('cms.hero.edit');
    Route::put('/cms/hero', [CmsHeroController::class, 'update'])->name('cms.hero.update');
    
    Route::resource('cms-anggota', AnggotaController::class)->except(['show']);
    Route::resource('cms-event', EventController::class)->except(['show']);
    Route::resource('cms-pages', PageController::class)->except(['show']);
    
    Route::resource('cms-sekbid', SekbidController::class);
    Route::post('/cms-sekbid/{id}/member', [SekbidController::class, 'storeMember'])->name('cms-sekbid.storeMember');
    Route::delete('/cms-sekbid-member/{id}', [SekbidController::class, 'destroyMember'])->name('cms-sekbid.destroyMember');

    Route::resource('users', UserController::class)->except(['show']);
});

require __DIR__.'/auth.php';