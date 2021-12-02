<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeIngredientController extends Controller
{
    public function show($id)
    {
        $ingredients = Recipe::select('ingredients')
            ->where('id', $id)
            ->get();

        return response()->json($ingredients);
    }
}
