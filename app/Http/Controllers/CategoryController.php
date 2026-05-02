<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
   public function index()
{
    $categories = Category::where('user_id', auth()->id())->get();

    return response()->json($categories);
}

   
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    $category = Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'user_id' => auth()->id()
    ]);

    return response()->json($category);
}
    
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json($category);
    }

    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
