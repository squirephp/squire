<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/squire.php' => config_path('squire.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../config/squire.php', 'squire'
        );
    }
}