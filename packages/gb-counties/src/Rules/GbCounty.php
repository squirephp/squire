<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class GbCounty extends Rule
{
    protected $message = 'squire-gb-counties::validation.gb_county';

    protected function getQueryBuilder()
    {
        return Models\GbCounty::query();
    }
}