<?php

namespace Squire\Rules;

use Squire\Models\Airline as AirlineModel;
use Squire\Rule;

class Airline extends Rule
{
    protected $message = 'squire-airlines::validation.airline';

    protected function getQueryBuilder()
    {
        return AirlineModel::query();
    }
}