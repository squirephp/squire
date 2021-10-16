<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class GbCountyRule extends Rule
{
    protected string $message = 'squire-gb-counties::validation.gb_county';

    protected function getQueryBuilder(): Builder
    {
        return Models\GbCounty::query();
    }
}
