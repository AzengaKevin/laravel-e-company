<?php


namespace App\Http\Views\Composers;


use App\Service;
use Illuminate\View\View;

class ServiceComposer
{
    public function compose(View $view)
    {
        $service = Service::latest()->first();

        $view->with('service', $service);
    }
}
