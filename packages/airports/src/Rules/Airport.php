<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Airport extends Rule
{
    protected $message = 'squire-airports::validation.airport';

    protected function getQueryBuilder()
    {
        return Models\Airport::query();
    }
}