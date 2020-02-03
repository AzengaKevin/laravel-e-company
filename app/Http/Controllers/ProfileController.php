<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user();

        $user->load('profile.image');

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        $user->load('profile.image');

        return view('profile.edit', compact('user'));

    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'max:256'],
            'username' => ['required', 'min:3', 'max:256'],
            'contact' => ['required', 'min:10', 'max:15'],
            'bio' => ['required', 'min:50'],
            'image' => ['mimes:png,jpeg,jpg,bmp'],
        ]);

        $user->name = request('name');
        $user->profile->username = request('username');
        $user->profile->contact = request('contact');
        $user->profile->bio = request('bio');

        $user->push();

        if ($request->has('image')) {
            //Delete the previous image
            if (!is_null($user->profile->image)){
                File::delete(public_path($user->profile->image->url));
                $user->profile->image()->delete();
            }

            //Upload Image
            $url = request('image')->store('uploads/images', 'public');

            //Resize Image
            Image::make(public_path("storage/{$url}"))->fit(600, 600)->save();

            //Persist the Image
            $user->profile->image()->create(['url' => "/storage/{$url}"]);
        }

        return redirect()->route('profile.show');

    }
}
