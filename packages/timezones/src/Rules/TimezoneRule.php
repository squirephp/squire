<?php

namespace Squire\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Models;
use Squire\Rule;

class TimezoneRule extends Rule
{
    protected string $message = 'squire-timezones::validation.timezone';

    protected function getQueryBuilder(): Builder
    {
        return Models\Timezone::query();
    }
}