<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $adverts = Advert::latest()->get();

        return view('adverts.index', compact('adverts'));
    }

    public function create()
    {
        return view('adverts.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        unset($data['image']);

        //Persist the post
        $advert = Advert::create($data);

        //Deal with the post Image
        if ($request->has('image')) {
            //Save and crop the image
            $url = $request->file('image')->store('uploads/images', 'public');
            Image::make(public_path("storage/{$url}"))->fit(1366, 768)->save();

            $advert->image()->create(['url' => "/storage/{$url}"]);
        }

        return redirect()->route('adverts.show', $advert);

    }

    public function show(Advert $advert)
    {
        return view('adverts.show', compact('advert'));
    }

    public function edit(Advert $advert)
    {
        return view('adverts.edit', compact('advert'));
    }

    public function update(Request $request, Advert $advert)
    {
        $data = $this->validateREquest($request);
        unset($data['image']);

        $advert->update($data);

        if ($request->has('image')) {

            if (!is_null($advert->image)) {
                //Delete the previous image and it's data
                File::delete(public_path($advert->image->url));
                $advert->image()->delete();
            }

            //Save and crop the image
            $url = $request->file('image')->store('uploads/images', 'public');
            Image::make(public_path("storage/{$url}"))->fit(1200, 900)->save();

            $advert->image()->create(['url' => "/storage/{$url}"]);
        }

        //Redirect
        return redirect()->route('adverts.show', $advert);
    }

    public function destroy(Advert $advert)
    {
        if (!is_null($advert->image)) {
            //Delete the previous image and it's data
            File::delete(public_path($advert->image->url));
            $advert->image()->delete();
        }

        $advert->delete();

        //redirect
        return view('adverts.index');
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:20'],
            'image' => ['mimes:jpg,png,jpeg'],
        ]);
    }


}
