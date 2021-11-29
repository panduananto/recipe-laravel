<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body_comment' => 'required|max:280',
        ]);

        $comment = new Comment();

        $comment->body = $validated['body_comment'];
        $comment->user_id = Auth::id();
        $comment->recipe_id = $request->route('id');

        $comment->save();

        return redirect(route('recipe.show', ['id' => $request->route('id')]));
    }
}
