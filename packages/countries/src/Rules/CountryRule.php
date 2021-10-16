<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class CountryRule extends Rule
{
    protected string $message = 'squire-countries::validation.country';

    protected function getQueryBuilder(): Builder
    {
        return Models\Country::query();
    }
}
