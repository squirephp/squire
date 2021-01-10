<?php

namespace Squire\Rules;

use Squire\Models\Continent as ContinentModel;
use Squire\Rule;

class Continent extends Rule
{
    protected $message = 'squire-continents::validation.continent';

    protected function getQueryBuilder()
    {
        return ContinentModel::query();
    }
}