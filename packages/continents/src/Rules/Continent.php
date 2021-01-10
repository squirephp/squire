<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Continent extends Rule
{
    protected $message = 'squire-continents::validation.continent';

    protected function getQueryBuilder()
    {
        return Models\Continent::query();
    }
}