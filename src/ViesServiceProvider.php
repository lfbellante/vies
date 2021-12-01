<?php

namespace Lfbellante\Vies;

use Illuminate\Support\ServiceProvider;

class ViesServiceProvider extends ServiceProvider
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
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.'/config/vies.php' => config_path('vies.php')
                ],
                'vies'
            );
        }
    }
}
