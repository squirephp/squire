<?php

namespace Squire\Rules;

use Squire\Models\Country as CountryModel;
use Squire\Rule;

class Country extends Rule
{
    protected $message = 'squire-countries::validation.country';

    protected function getQueryBuilder()
    {
        return CountryModel::query();
    }
}