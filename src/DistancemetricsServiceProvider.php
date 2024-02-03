<?php

namespace FlatDuck\Distancemetrics;

use Illuminate\Support\ServiceProvider;

class DistancemetricsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/distancemetrics.php' => config_path('distancemetrics.php')
            ]
        );
    }

    public function register()
    {
        $this->app->singleton(Distancemetrics::class, function () {
            return new Distancemetrics(config('distancemetrics.key'));
            }
        );
    }

}