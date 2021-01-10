<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Country extends Rule
{
    protected $message = 'squire-countries::validation.country';

    protected function getQueryBuilder()
    {
        return Models\Country::query();
    }
}