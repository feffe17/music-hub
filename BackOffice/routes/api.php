<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\GenreController;
use Illuminate\Support\Facades\Route;

// Rotte pubbliche accessibili dal frontend React (solo GET)
Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/{id}', [AlbumController::class, 'show']);

Route::get('songs', [SongController::class, 'index']);
Route::get('songs/{id}', [SongController::class, 'show']);

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{id}', [GenreController::class, 'show']);
