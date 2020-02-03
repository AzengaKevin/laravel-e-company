<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //Validating the user data
        $data = $this->validateRequest($request);

        //Inserting the category to the database
        auth()->user()->categories()->create($data);

        //Redirecting to all the data on the category resource
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        //Validating the user data
        $data = $this->validateRequest($request);

        //Update the category to the database
        $category->update($data);

        //Redirecting to all the data on the category resource
        return redirect()->route('categories.show', $category);
    }

    public function delete()
    {

    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:20'],
        ]);
    }
}
