<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Country;

class CountriesEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Country::class, 'en', __DIR__.'/../data.csv');
    }
}