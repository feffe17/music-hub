<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlbumWebController;
use App\Http\Controllers\GenreWebController;
use App\Http\Controllers\SongWebController;
use Illuminate\Support\Facades\Route;

// Rotte protette per la gestione nel backend (Blade)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestione Album
    Route::get('albums', [AlbumWebController::class, 'index'])->name('albums.index');
    Route::get('albums/create', [AlbumWebController::class, 'create'])->name('albums.create');
    Route::post('albums', [AlbumWebController::class, 'store'])->name('albums.store');
    Route::get('albums/{album}', [AlbumWebController::class, 'show'])->name('albums.show');
    Route::get('albums/{album}/edit', [AlbumWebController::class, 'edit'])->name('albums.edit');
    Route::put('albums/{album}', [AlbumWebController::class, 'update'])->name('albums.update');
    Route::delete('albums/{album}', [AlbumWebController::class, 'destroy'])->name('albums.destroy');

    // Gestione Canzoni
    Route::get('songs', [SongWebController::class, 'index'])->name('songs.index');
    Route::get('songs/create', [SongWebController::class, 'create'])->name('songs.create');
    Route::post('songs', [SongWebController::class, 'store'])->name('songs.store');
    Route::get('songs/{song}', [SongWebController::class, 'show'])->name('songs.show');
    Route::get('songs/{song}/edit', [SongWebController::class, 'edit'])->name('songs.edit');
    Route::put('songs/{song}', [SongWebController::class, 'update'])->name('songs.update');
    Route::delete('songs/{song}', [SongWebController::class, 'destroy'])->name('songs.destroy');

    // Gestione Generi
    Route::get('genres', [GenreWebController::class, 'index'])->name('genres.index');
    Route::get('genres/create', [GenreWebController::class, 'create'])->name('genres.create');
    Route::post('genres', [GenreWebController::class, 'store'])->name('genres.store');
    Route::get('genres/{genre}/edit', [GenreWebController::class, 'edit'])->name('genres.edit');
    Route::put('genres/{genre}', [GenreWebController::class, 'update'])->name('genres.update');
    Route::delete('genres/{genre}', [GenreWebController::class, 'destroy'])->name('genres.destroy');

    // Profilo utente
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
