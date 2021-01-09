<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Continent::class, 'en', __DIR__.'/../data.csv');
    }
}