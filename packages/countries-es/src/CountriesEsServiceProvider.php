<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesEsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Country::class, 'es', __DIR__.'/../resources/data.csv');
    }
}