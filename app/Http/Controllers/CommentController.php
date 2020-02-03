<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'body' => ['required', 'min:3'],
        ]);

        $data['user_id'] = auth()->user()->id;

        $post->comments()->create($data);

        return redirect($post->url());

    }
}
