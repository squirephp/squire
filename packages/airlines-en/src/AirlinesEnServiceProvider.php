<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Airline;

class AirlinesEnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Airline::class, 'en', __DIR__ . '/../resources/data.csv');
    }
}
