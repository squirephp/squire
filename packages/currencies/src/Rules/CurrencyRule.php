<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class CurrencyRule extends Rule
{
    protected string $message = 'squire-currencies::validation.currency';

    protected function getQueryBuilder(): Builder
    {
        return Models\Currency::query();
    }
}
