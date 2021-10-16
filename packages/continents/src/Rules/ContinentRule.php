<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class ContinentRule extends Rule
{
    protected string $message = 'squire-continents::validation.continent';

    protected function getQueryBuilder(): Builder
    {
        return Models\Continent::query();
    }
}
