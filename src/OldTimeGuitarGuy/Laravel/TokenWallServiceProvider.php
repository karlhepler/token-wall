<?php

namespace OldTimeGuitarGuy\Laravel;

use Illuminate\Support\ServiceProvider;

class TokenWallServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Copy over the config file
        $this->publishes([
            __DIR__.'/config/token-wall.php' => config_path('token-wall.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
