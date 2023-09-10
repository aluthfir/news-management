<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(News $news, Request $request)
    {
        $request->validate(['content' => 'required|max:1000']);

        $comment = $news->comments()->create([
            'content' => $request->content,
        ]);

        return new CommentResource($comment);
    }
}
