<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return response()->json(Album::with('songs')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'artist' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $album = Album::create($validated);
        return response()->json($album, 201);
    }

    public function show($id)
    {
        $album = Album::with('songs')->find($id);
        if (!$album) return response()->json(['message' => 'Album not found'], 404);
        return response()->json($album);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if (!$album) return response()->json(['message' => 'Album not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'artist' => 'sometimes|string|max:255',
            'description' => 'nullable|string'
        ]);

        $album->update($validated);
        return response()->json($album);
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        if (!$album) return response()->json(['message' => 'Album not found'], 404);

        $album->delete();
        return response()->json(['message' => 'Album deleted']);
    }
}
