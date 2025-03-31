<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Restituisce tutti i generi con le canzoni associate.
     * Se viene passato un nome come parametro, filtra per nome.
     */
    public function index(Request $request)
    {
        $query = Genre::with('songs');

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        return response()->json($query->get());
    }
}
