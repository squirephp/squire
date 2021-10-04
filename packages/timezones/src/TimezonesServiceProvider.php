<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'squire-timezones');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/squire-timezones'),
        ]);
    }
}