<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class ContinentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'squire-continents');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/squire-continents'),
        ]);
    }
}
