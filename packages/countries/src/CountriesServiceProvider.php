<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'squire-countries');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/squire-countries'),
        ]);
    }
}