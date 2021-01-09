<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        RepositoryManager::class => RepositoryManager::class,
    ];
}