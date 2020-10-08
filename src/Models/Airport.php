<?php

namespace Squire\Models;

use Squire\Model;

class Airport extends Model
{
    protected $source = 'airports';

    public function country()
    {
        return $this->hasOneThrough(Country::class, Region::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}