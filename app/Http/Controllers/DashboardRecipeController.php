<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Recipe;
use App\Models\Category;

class DashboardRecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::id())->get();

        return view('dashboard.pages.recipe')->with('recipes', $recipes);
    }

    public function create()
    {
        return view('dashboard.pages.create')->with('categories', Category::all());
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
        $recipe->user_id = Auth::id();

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('/images/recipes');
            $recipe->image = $validated['image'];
        }

        $recipe->save();

        return redirect(route('dashboard.pages.recipe'));
    }
}
