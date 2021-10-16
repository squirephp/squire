<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class CurrenciesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'squire-currencies');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/squire-currencies'),
        ]);
    }
}
