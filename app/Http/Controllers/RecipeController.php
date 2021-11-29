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
        return view('pages.index')->with('recipes', Recipe::all());
    }

    public function show($id)
    {
        return view('pages.detail')
            ->with('recipe', Recipe::findOrFail($id))
            ->with(
                'comments',
                Comment::select()
                    ->where('recipe_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get(),
            );
    }
}
