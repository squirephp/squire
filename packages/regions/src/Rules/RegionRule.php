<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class RegionRule extends Rule
{
    protected string $message = 'squire-regions::validation.region';

    protected function getQueryBuilder(): Builder
    {
        return Models\Region::query();
    }
}