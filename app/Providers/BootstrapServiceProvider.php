<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([base_path('vendor/twbs/bootstrap/dist') => public_path('bootstrap')],'public');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
