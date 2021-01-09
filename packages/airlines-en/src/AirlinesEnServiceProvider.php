<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Airline;

class AirlinesEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Airline::class, 'en', __DIR__.'/../data.csv');
    }
}