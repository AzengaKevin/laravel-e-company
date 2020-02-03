<?php

namespace App\Providers;

use App\Http\Views\Composers\AdvertsComposer;
use App\Http\Views\Composers\AuthUserComposer;
use App\Http\Views\Composers\CategoryComposer;
use App\Http\Views\Composers\ProductsComposer;
use App\Http\Views\Composers\ServiceComposer;
use App\Http\Views\Composers\TeamComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['pages.index'], AdvertsComposer::class);
        View::composer(['partials.sidebar'], AuthUserComposer::class);
        View::composer(['pages.index'], TeamComposer::class);
        View::composer(['pages.index'], ServiceComposer::class);
        View::composer(['pages.index'], ProductsComposer::class);
        View::composer(['categories.index', 'products.create', 'products.edit'], CategoryComposer::class);
    }
}
