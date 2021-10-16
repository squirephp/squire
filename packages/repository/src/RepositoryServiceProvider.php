<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        RepositoryManager::class => RepositoryManager::class,
    ];
}
