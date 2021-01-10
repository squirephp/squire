<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Region extends Rule
{
    protected $message = 'squire-regions::validation.region';

    protected function getQueryBuilder()
    {
        return Models\Region::query();
    }
}