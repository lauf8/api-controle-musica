<?php

namespace App\Http\Controllers;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrackController extends Controller
{
    public function index()
    {
        $track = Track::all();
        return response()->json($track, Response::HTTP_OK);
    }


    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'album_id' => 'required|exists:albums,id',
            'duration' => 'required|numeric',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $track = Track::create([
            'name' => $validated['name'],
            'album_id' => $validated['album_id'],
            'duration' => $validated['duration'],
        ]);
        
        
        $track->categories()->attach($validated['categories']);

        return response()->json($track, Response::HTTP_CREATED);
    }

    
    public function show(Track $track)
    {
        return response()->json($track, Response::HTTP_OK);
    }

    
    public function update(Request $request, Track $track)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $track->update($validated);

        return response()->json($track, Response::HTTP_OK);
    }

    
    public function destroy(Track $track)
    {
        $track->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function search(Request $request)
    {
        
        $searchTerm = $request->query('query', '');

        
        $tracks = Track::where('name', 'like', "%$searchTerm%")->get();

        return response()->json($tracks);
    }
}
