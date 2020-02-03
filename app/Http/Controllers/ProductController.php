<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //Validation
        $data = $this->validateRequest($request);

        //Removing the Image key From the Array
        unset($data['image']);

        //Persist the product to the database
        $product = Product::create($data);

        if ($request->has('image')) {

            //Move the uploaded image to the storage folder
            $url = $request->file('image')->store('uploads/images', 'public');

            //Resizing the image
            Image::make(public_path("storage/{$url}"))->fit(600, 600)->save();

            //Persist the image url using the relationship
            $product->image()->create(['url' => "/storage/{$url}"]);
        }


        //Redirect to all products
        return redirect()->route('products.index');

    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //Validation
        $data = $this->validateRequest($request);

        //Removing the Image key From the Array
        unset($data['image']);

        //Update the product details
        $product->update($data);

        if ($request->has('image')) {

            //Delete the previous image
            File::delete(public_path($product->image->url));

            //Delete the image record
            $product->image()->delete();

            //Move the uploaded image to the storage folder
            $url = $request->file('image')->store('uploads/images', 'public');

            //Resizing the image
            Image::make(public_path("storage/{$url}"))->fit(600, 600)->save();

            //Persist the image url using the relationship
            $product->image()->create(['url' => "/storage/{$url}"]);
        }

        return redirect()->route('products.show', $product);

    }


    public function destroy(Product $product)
    {
        //Delete the image from the storage
        $imagePath = $product->image->url;

        File::delete(public_path($imagePath));

        //Delete the related image record from db
        $product->image()->delete();

        //Delete the product from db
        $product->delete();

        //Redirect accordingly
        return redirect()->route('products.index');
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3', 'max:256'],
            'cost' => ['required'],
            'description' => ['required', 'min:20'],
            'category_id' => ['required'],
            'image' => ['mimes:jpg,jpeg,png'],
        ]);
    }
}
