<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumWebController extends Controller
{
    /**
     * Mostra la lista di tutti gli album.
     */
    public function index()
    {
        $albums = Album::with('songs')->get();
        return view('albums.index', compact('albums'));
    }

    /**
     * Mostra un singolo album.
     */
    public function show($id)
    {
        $album = Album::with('songs')->findOrFail($id);
        return view('albums.show', compact('album'));
    }

    /**
     * Mostra il form per creare un nuovo album.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Salva un nuovo album nel database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'artist' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Album::create($validated);

        return redirect()->route('albums.index')->with('success', 'Album creato con successo!');
    }

    /**
     * Mostra il form per modificare un album.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    /**
     * Aggiorna un album esistente.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'artist' => 'sometimes|string|max:255',
            'description' => 'nullable|string'
        ]);

        $album->update($validated);

        return redirect()->route('albums.index')->with('success', 'Album aggiornato con successo!');
    }

    /**
     * Cancella un album.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album eliminato con successo!');
    }
}
