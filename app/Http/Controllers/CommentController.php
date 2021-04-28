<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function news(Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'news_id' => $request->id,
            'project_id' => null,
            'body' => $request->body
        ]);

        return redirect()->back();
    }

    public function projects(Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'news_id' => null,
            'project_id' => $request->id,
            'body' => $request->body
        ]);

        return redirect()->back();
    }

}
