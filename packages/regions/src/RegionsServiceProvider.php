<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class RegionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'squire-regions');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/squire-regions'),
        ]);
    }
}