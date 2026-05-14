<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SekbidController;
use App\Http\Controllers\SekbidMemberController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CmsHeroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes - OSIS SMK KETINTANG (STABILIZATION MODE)
|--------------------------------------------------------------------------
*/

// --- 1. RUTE PUBLIK ---
// DIKEMBALIKAN KE 'home' AGAR TIDAK BENTROK DENGAN DASHBOARD ADMIN
Route::get('/', [PageController::class, 'home'])->name('home'); 
Route::get('/sekbid/{id}', [PageController::class, 'sekbidShow'])->name('sekbid.show');
Route::get('/p/{slug}', [PageController::class, 'pageShow'])->name('page.show');
Route::get('/event/{id}', [EventController::class, 'showPublic'])->name('event.show'); 

// --- 2. RUTE GAMBAR ---
Route::get('/storage/{path}', function ($path) {
    $path = storage_path('app/public/' . $path);
    if (!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->where('path', '.*');

// --- 3. RUTE DASHBOARD & ADMIN (DIKUNCI AUTH) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen E-Arsip
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);
    Route::resource('document-categories', DocumentCategoryController::class)->except(['show']);
    Route::resource('documents', DocumentController::class)->except(['show']);

    // CMS Konten
    Route::get('/cms/hero', [CmsHeroController::class, 'edit'])->name('cms.hero.edit');
    Route::put('/cms/hero', [CmsHeroController::class, 'update'])->name('cms.hero.update');
    Route::resource('cms-anggota', AnggotaController::class)->except(['show']);
    Route::resource('cms-event', EventController::class)->except(['show']);
    Route::resource('cms-pages', PageController::class)->except(['show']);

    // Manajemen Seksi Bidang
    Route::resource('cms-sekbid', SekbidController::class);
    Route::post('/cms-sekbid/{id}/member', [SekbidController::class, 'storeMember'])->name('cms-sekbid.storeMember');
    Route::delete('/cms-sekbid-member/{id}', [SekbidController::class, 'destroyMember'])->name('cms-sekbid.destroyMember');

    // Manajemen Akun Admin
    Route::resource('users', UserController::class)->except(['show']);
});

// --- 4. DEBUG TOOLS (PEMBERSIH KERAK CACHE) ---
Route::get('/debug-fix', function() {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    $sessionPath = storage_path('framework/sessions');
    $files = File::files($sessionPath);
    foreach ($files as $file) {
        if ($file->getFilename() !== '.gitignore') {
            File::delete($file);
        }
    }
    return "Sistem Telah Segar Kembali, Yang Mulia!";
});

// --- 5. RUTE OTENTIKASI BAWAAN ---
require __DIR__.'/auth.php';