<?php

namespace App\Modules\Recruitdashboard\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'recruitdashboard');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'recruitdashboard');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'recruitdashboard');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
