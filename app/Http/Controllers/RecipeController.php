<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Comment;

class RecipeController extends Controller
{
    public function index()
    {
        return view('pages.index')->with('recipes', Recipe::simplePaginate(4));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('pages.detail')->with('recipe', $recipe);
    }
}
