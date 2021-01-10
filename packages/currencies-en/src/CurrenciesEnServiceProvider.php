<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Currency;

class CurrenciesEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Currency::class, 'en', __DIR__.'/../resources/data.csv');
    }
}