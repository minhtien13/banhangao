<?php

namespace App\Providers;

use App\view\composers\ContactComposer;
use App\view\composers\PolicyComposer;
use App\view\composers\ProductComposer;
use App\view\composers\SoclaiComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('footer', ContactComposer::class);
        view::composer('footer', SoclaiComposer::class);
        view::composer('footer', PolicyComposer::class);
        view::composer('blogs.sidebar', ProductComposer::class);
    }
}