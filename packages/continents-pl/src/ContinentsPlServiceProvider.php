<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsPlServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Continent::class, 'pl', __DIR__ . '/../resources/data.csv');
    }
}
