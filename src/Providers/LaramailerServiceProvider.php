<?php

namespace Laramailer\Providers;

use Illuminate\Support\ServiceProvider;

class LaramailerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../views/' => base_path('resources/views/andrefigueira/laramailer'),
        ]);

        $this->loadViewsFrom(dirname(__DIR__) . '/views', 'laramailer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include dirname(__DIR__) . '/routes.php';

        $this->app->make('Laramailer\Controllers\EmailController');
    }
}
