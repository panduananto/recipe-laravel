<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardRecipeController extends Controller
{
    private $toValidate = [
        'title' => 'required|max:30|',
        'description' => 'required',
        'image' => 'nullable|file|image|max:1024',
        'ingredients.*.id' => 'required',
        'ingredients.*.name' => 'required',
        'ingredients.*.amount' => 'required',
        'body_text' => 'required',
        'category_id' => 'required',
    ];

    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::id())->get();

        return view('dashboard.pages.recipe')->with('recipes', $recipes);
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('dashboard.pages.detail')->with('recipe', $recipe);
    }

    public function create()
    {
        return view('dashboard.pages.create')->with('categories', Category::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->toValidate);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('/images/recipes');
        }

        $validated['user_id'] = Auth::id();

        Recipe::create($validated);

        return redirect(route('dashboard.recipe.index'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.pages.edit')
            ->with('recipe', $recipe)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipeOldImage = $recipe->image;

        $validated = $request->validate($this->toValidate);

        if ($request->file('image')) {
            if ($recipeOldImage) {
                Storage::delete($recipeOldImage);
            }

            $validated['image'] = $request->file('image')->store('/images/recipes');
        }

        $recipe->user_id = Auth::id();

        Recipe::create($validated);

        return redirect(route('dashboard.recipe.show', ['id' => $id]));
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipeOldImage = $recipe->image;

        if ($recipeOldImage) {
            Storage::delete($recipeOldImage);
        }

        $recipe->delete();

        return redirect(route('dashboard.recipe.index'));
    }

    public function getIngredients($id)
    {
        $ingredients = Recipe::select('ingredients')
            ->where('id', $id)
            ->get();

        return response()->json($ingredients);
    }
}
