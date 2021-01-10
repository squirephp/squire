<?php

namespace Squire\Rules;

use Squire\Models\Currency as CurrencyModel;
use Squire\Rule;

class Currency extends Rule
{
    protected $message = 'squire-currencies::validation.currency';

    protected function getQueryBuilder()
    {
        return CurrencyModel::query();
    }
}