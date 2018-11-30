<?php

namespace Fkomaralp\Postaguvercini;

use Illuminate\Support\ServiceProvider;

class PostaguverciniServiceProvider extends ServiceProvider
{
     /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/Postaguvercini.php';
        $this->publishes([$configPath => config_path('Postaguvercini.php')], 'config');

        $this->app->singleton('postaguvercini', function($app){
            return new Client();
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
