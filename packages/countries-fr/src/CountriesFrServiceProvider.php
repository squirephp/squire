<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesFrServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Country::class, 'fr', __DIR__.'/../resources/data.csv');
    }
}