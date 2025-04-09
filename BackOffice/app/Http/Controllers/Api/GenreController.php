<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function index(Request $request)
    {
        $query = Genre::with('songs');

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        return response()->json($query->get());
        // return response()->json($query->paginate(10));
    }
}
