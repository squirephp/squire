<?php

namespace Squire\Models;

use Squire\Model;

class GbCounty extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}