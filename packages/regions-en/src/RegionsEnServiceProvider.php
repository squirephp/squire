<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Region;

class RegionsEnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Region::class, 'en', __DIR__ . '/../resources/data.csv');
    }
}