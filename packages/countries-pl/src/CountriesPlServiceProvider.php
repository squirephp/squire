<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesPlServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Country::class, 'pl', __DIR__ . '/../resources/data.csv');
    }
}