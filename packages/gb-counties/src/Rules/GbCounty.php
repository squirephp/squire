<?php

namespace Squire\Rules;

use Squire\Models\GbCounty as GbCountyModel;
use Squire\Rule;

class GbCounty extends Rule
{
    protected $message = 'squire-gb-counties::validation.gb_county';

    protected function getQueryBuilder()
    {
        return GbCountyModel::query();
    }
}