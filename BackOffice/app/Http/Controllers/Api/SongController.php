<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        return response()->json(Song::with(['album', 'genre'])->get());
    }

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

        $song = Song::create($validated);
        return response()->json($song, 201);
    }

    public function show($id)
    {
        $song = Song::with(['album', 'genre'])->find($id);
        if (!$song) return response()->json(['message' => 'Song not found'], 404);
        return response()->json($song);
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        if (!$song) return response()->json(['message' => 'Song not found'], 404);

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
        return response()->json($song);
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        if (!$song) return response()->json(['message' => 'Song not found'], 404);

        $song->delete();
        return response()->json(['message' => 'Song deleted']);
    }
}
