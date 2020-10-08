<?php

namespace Squire\Models;

use Squire\Model;

class Airline extends Model
{
    protected $source = 'airlines';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function continent()
    {
        return $this->hasOneThrough(Continent::class, Country::class);
    }
}