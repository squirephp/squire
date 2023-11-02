<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesItServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Country::class, 'it', __DIR__ . '/../resources/data.csv');
    }
}
