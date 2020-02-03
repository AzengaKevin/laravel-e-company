<?php


namespace App\Http\Views\Composers;


use App\Advert;
use Illuminate\View\View;

class AdvertsComposer
{
    public function compose(View $view)
    {
        $adverts = Advert::latest()->limit(3)->get();
        $view->with('adverts', $adverts);
    }
}
