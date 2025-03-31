<?php

use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\GenreController;
use Illuminate\Support\Facades\Route;

// API pubbliche per il frontend React (solo GET)
Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/search/{name}', [AlbumController::class, 'searchByName']);

Route::get('songs', [SongController::class, 'index']);
Route::get('songs/search/{name}', [SongController::class, 'searchByName']);

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/search/{name}', [GenreController::class, 'searchByName']);
