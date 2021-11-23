<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Category;

class RecipeController extends Controller
{
    public function index()
    {
        return view('pages.index')->with('recipes', Recipe::all());
    }

    public function show($id)
    {
        return view('pages.detail')->with('recipe', Recipe::findOrFail($id));
    }

    public function create()
    {
        return view('pages.create')->with('categories', Category::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:30|',
            'description' => 'required',
            'image' => 'nullable|file|image|max:1024',
            'category_id' => 'required',
        ]);

        $recipe = new Recipe();

        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->category_id = $validated['category_id'];

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('/images/recipes');
            $recipe->image = $validated['image'];
        }

        $recipe->save();

        return redirect(route('recipe.index'));
    }
}
