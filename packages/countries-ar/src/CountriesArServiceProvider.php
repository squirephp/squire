<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesArServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Country::class, 'ar', __DIR__ . '/../resources/data.csv');
    }
}
