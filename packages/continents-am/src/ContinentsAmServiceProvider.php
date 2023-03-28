<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsAmServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \Squire\Repository::registerSource(Continent::class, 'am', __DIR__ . '/../resources/data.csv');
    }
}
