<?php

namespace Squire;

use Illuminate\Support\Facades\Facade;

class Repository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RepositoryManager::class;
    }
}
