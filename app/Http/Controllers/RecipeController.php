<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

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
}
