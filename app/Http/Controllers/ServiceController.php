<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Getting all services
        $services = Service::all();

        //Returning the necessary view and data
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        //Validate the user data
        $data = $this->validateRequest($request);

        //Remove the image from the validated array
        unset($data['image']);

        //Store the uploaded image
        $url = $request->file('image')->store('uploads/images', 'public');

        //Persist the service
        $service = Service::create($data);

        //Persist the Image
        $service->image()->create(['url' => "/storage/{$url}"]);

        //Redirect to see all the services
        return redirect()->route('services.index');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        //Validate the user data
        $data = $this->validateRequest($request);

        //Remove the image from the validated array
        unset($data['image']);

        //Persist the service
        $service->update($data);

        if ($request->has('image')) {
            //Delete the previous image
            File::delete(public_path($service->image->url));
            $service->image()->delete();

            //Store the uploaded image
            $url = $request->file('image')->store('uploads/images', 'public');
            Image::make(public_path("storage/{$url}"))->fit(1200, 1200)->save();

            //Persist the Image
            $service->image()->create(['url' => "/storage/{$url}"]);
        }

        //Redirect to see all the services
        return redirect()->route('services.index');
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:150'],
            'image' => ['mimes:jgp,jpeg,png,bmp'],
        ]);
    }
}
