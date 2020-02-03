<?php


namespace App\Http\Views\Composers;


use App\Product;
use Illuminate\View\View;

class ProductsComposer
{
    public function compose(View $view)
    {
        $products = Product::latest()->limit(3)->get();

        $view->with('products', $products);
    }
}
