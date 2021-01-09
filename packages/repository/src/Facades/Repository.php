<?php

namespace Squire\Facades;

use Illuminate\Support\Facades\Facade;
use Squire\RepositoryManager;

class Repository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RepositoryManager::class;
    }
}