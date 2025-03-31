<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Restituisce tutti gli album con le canzoni associate
     * Se viene passato un nome come parametro, filtra per nome.
     */
    public function index(Request $request)
    {
        $query = Album::with('songs');

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        return response()->json($query->get());
    }
}
