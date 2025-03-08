<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class AircraftRule extends Rule
{
    protected string $message = 'squire-aircrafts::validation.aircraft';

    protected function getQueryBuilder(): Builder
    {
        return Models\Aircraft::query();
    }
}
