<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = auth()->user()->posts;

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //Validate user data
        $data = $this->validateRequest($request);

        //Unset the validated image
        unset($data['image']);

        //Persist the post
        $post = auth()->user()->posts()->create($data);

        //Deal with the post Image
        if ($request->has('image')) {
            //Save and crop the image
            $url = $request->file('image')->store('uploads/images', 'public');
            Image::make(public_path("storage/{$url}"))->fit(1200, 1200)->save();

            $post->image()->create(['url' => "/storage/{$url}"]);
        }

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        //Check whether the user is logged in and add a view if necessary
        $user = auth()->user();

        if (!is_null($user)) {
            $post->views()->syncWithoutDetaching($user);
        }

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    public function update(Request $request, Post $post)
    {
        //Validate the request
        $data = $this->validateRequest($request);

        //Unset the Image
        unset($data['image']);

        //Update the posts data
        $post->update($data);

        //Check image in the post data
        if ($request->has('image')) {

            if (!is_null($post->image)) {
                File::delete(public_path($post->image->url));
                $post->image()->delete();
            }

            //Store and crop the new image
            $url = $request->file('image')->store('uploads/images', 'public');
            Image::make(public_path("storage/{$url}"))->fit(1200, 1200)->save();

            $post->image()->create(['url' => "/storage/{$url}"]);

        }

        //Redirect to the post
        return redirect()->route('posts.show', $post);

    }

    public function destroy(Post $post)
    {

    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => ['required', 'min:3', 'max:256'],
            'body' => ['required', 'min:50'],
            'image' => ['mimes:png,jpg,jpeg,bmp'],
        ]);
    }
}
