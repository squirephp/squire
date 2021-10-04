<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class AirlineRule extends Rule
{
    protected string $message = 'squire-airlines::validation.airline';

    protected function getQueryBuilder(): Builder
    {
        return Models\Airline::query();
    }
}