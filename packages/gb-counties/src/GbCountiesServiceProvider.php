<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class GbCountiesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'squire-gb-counties');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/squire-gb-counties'),
        ]);
    }
}
