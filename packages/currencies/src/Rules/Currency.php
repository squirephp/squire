<?php

namespace Squire\Rules;

use Squire\Models;
use Squire\Rule;

class Currency extends Rule
{
    protected $message = 'squire-currencies::validation.currency';

    protected function getQueryBuilder()
    {
        return Models\Currency::query();
    }
}