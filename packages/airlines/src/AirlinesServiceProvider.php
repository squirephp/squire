<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class AirlinesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'squire-airlines');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/squire-airlines'),
        ]);
    }
}
