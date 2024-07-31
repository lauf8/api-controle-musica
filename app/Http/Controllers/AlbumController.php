<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Album;


class AlbumController extends Controller
{
    public function index()
    {
        $album = Album::all();
        return response()->json($album, Response::HTTP_OK);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'singer_id' => 'required',
        ]);

        $album = Album::create($validated);

        return response()->json($album, Response::HTTP_CREATED);
    }

    
    public function show(Album $album)
    {
        return response()->json($album, Response::HTTP_OK);
    }

    
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $album->update($validated);

        return response()->json($album, Response::HTTP_OK);
    }

    
    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
