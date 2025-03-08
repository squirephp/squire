<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Aircraft;

class AircraftsEnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Aircraft::class, 'en', __DIR__ . '/../resources/data.csv');
    }
}
