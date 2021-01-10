<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class AirportsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'squire-airports');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/squire-airports'),
        ]);
    }
}