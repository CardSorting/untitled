<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\Stickers\SportsStickerController;
use App\Http\Controllers\Stickers\ReligiousStickerController;
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

    // Main sticker routes for index and show
    Route::resource('stickers', StickerController::class)->only(['index', 'show']);

    // Specialized sticker creation routes
    Route::prefix('stickers')->name('stickers.')->group(function () {
        // Sports stickers
        Route::get('/sports/create', [SportsStickerController::class, 'create'])->name('sports.create');
        Route::post('/sports', [SportsStickerController::class, 'store'])->name('sports.store');

        // Religious stickers
        Route::get('/religious/create', [ReligiousStickerController::class, 'create'])->name('religious.create');
        Route::post('/religious', [ReligiousStickerController::class, 'store'])->name('religious.store');
    });
});

require __DIR__.'/auth.php';
