<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsDeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Continent::class, 'de', __DIR__.'/../resources/data.csv');
    }
}
