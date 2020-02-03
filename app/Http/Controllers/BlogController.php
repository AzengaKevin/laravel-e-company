<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.frontend.index', compact('posts'));
    }

    public function show(Post $post)
    {
        //Check whether the user is logged in and add a view if necessary
        $user = auth()->user();

        if (!is_null($user)) {
            $post->views()->syncWithoutDetaching($user);
        }

        return view('posts.frontend.show', compact('post'));
    }
}
