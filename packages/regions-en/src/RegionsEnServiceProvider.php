<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Facades\Repository;
use Squire\Models\Region;

class RegionsEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(Region::class, 'en', __DIR__.'./../data.csv');
    }
}