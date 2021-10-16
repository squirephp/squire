<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\GbCounty;

class GbCountiesEnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(GbCounty::class, 'en', __DIR__ . '/../resources/data.csv');
    }
}
