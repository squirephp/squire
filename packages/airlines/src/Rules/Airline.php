<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Airline extends Rule
{
    protected $message = 'squire-airlines::validation.airline';

    protected function getQueryBuilder()
    {
        return Models\Airline::query();
    }
}