<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Facades\Repository;
use Squire\Models\GbCounty;

class GbCountiesEnServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Repository::registerSource(GbCounty::class, 'en', __DIR__.'./../data.csv');
    }
}