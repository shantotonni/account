<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ArrayFlattenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('generalclass', function()
        {
            return new \App\Lib\FacedeFactory\ArrayRequestFlat();
        });
    }
}
