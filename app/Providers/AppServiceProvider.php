<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\paginator;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        paginator::useBootstrap();
    }
}
