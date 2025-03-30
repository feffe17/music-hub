<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\GenreController;
use Illuminate\Support\Facades\Route;

// Rotte protette con autenticazione
Route::middleware('auth:sanctum')->group(function () {

    // Gestione degli album
    Route::post('albums', [AlbumController::class, 'store']);
    Route::put('albums/{id}', [AlbumController::class, 'update']);
    Route::delete('albums/{id}', [AlbumController::class, 'destroy']);

    // Gestione delle canzoni
    Route::post('songs', [SongController::class, 'store']);
    Route::put('songs/{id}', [SongController::class, 'update']);
    Route::delete('songs/{id}', [SongController::class, 'destroy']);

    // Gestione dei generi
    Route::post('genres', [GenreController::class, 'store']);
    Route::put('genres/{id}', [GenreController::class, 'update']);
    Route::delete('genres/{id}', [GenreController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
