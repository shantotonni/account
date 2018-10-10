<?php

namespace App\Modules\Recurringbill\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'recurringbill');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'recurringbill');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'recurringbill');
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
