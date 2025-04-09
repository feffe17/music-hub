<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreWebController extends Controller
{
    //Mostra la lista di tutti i generi.
    public function index()
    {
        $genres = Genre::with('songs')->get();
        return view('genres.index', compact('genres'));
    }

    //Mostra il form per creare un nuovo genere.
    public function create()
    {
        return view('genres.create');
    }

    //Salva un nuovo genere nel database.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name'
        ]);

        Genre::create($validated);

        return redirect()->route('genres.index')->with('success', 'Genere creato con successo!');
    }

    //Mostra il form per modificare un genere.
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    //Aggiorna un genere esistente.
    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255|unique:genres,name,' . $id
        ]);

        $genre->update($validated);

        return redirect()->route('genres.index')->with('success', 'Genere aggiornato con successo!');
    }

    //Cancella un genere.
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genere eliminato con successo!');
    }
}
