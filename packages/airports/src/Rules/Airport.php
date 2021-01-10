<?php

namespace Squire\Rules;

use Squire\Models\Airport as AirportModel;
use Squire\Rule;

class Airport extends Rule
{
    protected $message = 'squire-airports::validation.airport';

    protected function getQueryBuilder()
    {
        return AirportModel::query();
    }
}