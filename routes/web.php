<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DevisController;
use App\Http\Controllers\Admin\GalerieController;
use App\Http\Controllers\Admin\DigipadController;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

// ── SITE PUBLIC ─────────────────────────────────────────────

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/menus/{menu:slug}', [PageController::class, 'menu'])->name('menus.show');
Route::get('/donne-moi-des-ailes', [PageController::class, 'ailes'])->name('ailes');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// ── PROFIL BREEZE ───────────────────────────────────────────

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ── ADMIN ────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Devis
    Route::get('devis', [DevisController::class, 'index'])->name('devis.index');
    Route::get('devis/{id}', [DevisController::class, 'show'])->name('devis.show');
    Route::patch('devis/{id}', [DevisController::class, 'update'])->name('devis.update');
    Route::delete('devis/{id}', [DevisController::class, 'destroy'])->name('devis.destroy');

    Route::resource('galerie', GalerieController::class)->only(['index', 'store', 'destroy']);
    Route::resource('menus', MenuController::class);
    Route::resource('digipad', DigipadController::class);
});

require __DIR__.'/auth.php';