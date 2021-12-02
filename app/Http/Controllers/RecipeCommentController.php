<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Recipe;
use App\Models\Comment;

class RecipeCommentController extends Controller
{
    public function show($id)
    {
        $comments = Comment::where('recipe_id', $id)
            ->with('user')
            ->simplePaginate(3);

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|max:280',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['recipe_id'] = $request->route('id');

        Comment::create($validated);

        return redirect(route('recipe.show', ['id' => $request->route('id')]));
    }
}
