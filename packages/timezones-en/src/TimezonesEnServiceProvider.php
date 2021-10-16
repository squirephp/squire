<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Timezone;

class TimezonesEnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Timezone::class, 'en', __DIR__ . '/../resources/data.csv');
    }
}
