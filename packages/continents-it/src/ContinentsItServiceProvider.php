<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsItServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Continent::class, 'it', __DIR__ . '/../resources/data.csv');
    }
}
