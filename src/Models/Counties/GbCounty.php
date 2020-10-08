<?php

namespace Squire\Models\Counties;

use Squire\Model;
use Squire\Models\Region;

class GbCounty extends Model
{
    protected $source = 'counties/gb';

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}