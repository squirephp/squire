<?php

namespace Squire\Models;

use Squire\Model;

class Airport extends Model
{
    public function country()
    {
        return $this->hasOneThrough(Country::class, Region::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}