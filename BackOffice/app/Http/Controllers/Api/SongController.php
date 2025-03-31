<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Restituisce tutte le canzoni con album e genere associati.
     * Se viene passato un nome come parametro, filtra per titolo.
     */
    public function index(Request $request)
    {
        $query = Song::with(['album', 'genre']);

        if ($request->has('name')) {
            $query->where('title', 'like', '%' . $request->query('name') . '%');
        }

        return response()->json($query->get());
    }
}
