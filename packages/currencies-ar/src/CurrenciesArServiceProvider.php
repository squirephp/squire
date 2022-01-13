<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Currency;

class CurrenciesArServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Currency::class, 'ar', __DIR__ . '/../resources/data.csv');
    }
}
