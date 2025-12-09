<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;

class ContinentsUaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Continent::class, 'uk', __DIR__ . '/../resources/data.csv');
    }
}
