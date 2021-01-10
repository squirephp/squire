<?php

namespace Squire\Rules;

use Squire\Models\Region as RegionModel;
use Squire\Rule;

class Region extends Rule
{
    protected $message = 'squire-regions::validation.region';

    protected function getQueryBuilder()
    {
        return RegionModel::query();
    }
}