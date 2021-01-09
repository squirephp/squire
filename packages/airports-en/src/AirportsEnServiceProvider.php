<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Airport;

class AirportsEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Airport::class, 'en', __DIR__.'/../data.csv');
    }
}