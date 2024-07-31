<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SingerController extends Controller
{
    
    public function index()
    {
        $singers = Singer::all();
        return response()->json($singers, Response::HTTP_OK);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $singer = Singer::create($validated);

        return response()->json($singer, Response::HTTP_CREATED);
    }

    
    public function show(Singer $singer)
    {
        return response()->json($singer, Response::HTTP_OK);
    }

    
    public function update(Request $request, Singer $singer)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $singer->update($validated);

        return response()->json($singer, Response::HTTP_OK);
    }

    
    public function destroy(Singer $singer)
    {
        $singer->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
