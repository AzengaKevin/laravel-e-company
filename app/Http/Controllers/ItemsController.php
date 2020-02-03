<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.frontend.index', compact('products'));
    }
}
