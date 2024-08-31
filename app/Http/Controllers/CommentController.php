<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(request $request, $postId)
    {
        $request->validate([
            'text' => 'required'
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::user()->id,
            'text' => $request->text
        ]);

        return back();
    }
}
