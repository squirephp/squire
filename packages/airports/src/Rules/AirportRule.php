<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class AirportRule extends Rule
{
    protected string $message = 'squire-airports::validation.airport';

    protected function getQueryBuilder(): Builder
    {
        return Models\Airport::query();
    }
}
