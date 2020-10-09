<?php

namespace Squire\Models\Counties;

use Squire\Model;
use Squire\Models\Region;

class ItCounty extends Model
{
    protected $source = 'counties/it';

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
