<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category, Response::HTTP_OK);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($validated);

        return response()->json($category, Response::HTTP_CREATED);
    }

    
    public function show(Category $category)
    {
        return response()->json($category, Response::HTTP_OK);
    }

    
    public function update(Request $request, Singer $category)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return response()->json($category, Response::HTTP_OK);
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
