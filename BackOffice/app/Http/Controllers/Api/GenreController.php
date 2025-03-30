<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(Genre::with('songs')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name'
        ]);

        $genre = Genre::create($validated);
        return response()->json($genre, 201);
    }

    public function show($id)
    {
        $genre = Genre::with('songs')->find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);
        return response()->json($genre);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255|unique:genres,name,' . $id
        ]);

        $genre->update($validated);
        return response()->json($genre);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);

        $genre->delete();
        return response()->json(['message' => 'Genre deleted']);
    }
}
