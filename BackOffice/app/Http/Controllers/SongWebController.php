<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongWebController extends Controller
{
    /**
     * Mostra la lista di tutte le canzoni.
     */
    public function index()
    {
        $songs = Song::with(['album', 'genre'])->get();
        return view('songs.index', compact('songs'));
    }

    /**
     * Mostra il form per creare una nuova canzone.
     */
    public function create()
    {
        $albums = Album::all();
        $genres = Genre::all();
        return view('songs.create', compact('albums', 'genres'));
    }

    /**
     * Salva una nuova canzone nel database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album_id' => 'nullable|exists:albums,id',
            'genre_id' => 'required|exists:genres,id',
            'release_date' => 'nullable|date',
            'youtube_link' => 'nullable|url',
            'spotify_link' => 'nullable|url'
        ]);

        Song::create($validated);

        return redirect()->route('songs.index')->with('success', 'Canzone creata con successo!');
    }

    /**
     * Mostra il form per modificare una canzone.
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $albums = Album::all();
        $genres = Genre::all();
        return view('songs.edit', compact('song', 'albums', 'genres'));
    }

    /**
     * Aggiorna una canzone esistente.
     */
    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'artist' => 'sometimes|string|max:255',
            'album_id' => 'nullable|exists:albums,id',
            'genre_id' => 'sometimes|exists:genres,id',
            'release_date' => 'nullable|date',
            'youtube_link' => 'nullable|url',
            'spotify_link' => 'nullable|url'
        ]);

        $song->update($validated);

        return redirect()->route('songs.index')->with('success', 'Canzone aggiornata con successo!');
    }

    /**
     * Cancella una canzone.
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Canzone eliminata con successo!');
    }
}
