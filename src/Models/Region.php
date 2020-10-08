<?php

namespace Squire\Models;

use Squire\Model;
use Squire\Models\Counties\GbCounty;

class Region extends Model
{
    protected $source = 'regions';

    public function airports()
    {
        return $this->hasMany(Airport::class);
    }

    public function continent()
    {
        return $this->hasOneThrough(Continent::class, Country::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function gbCounties()
    {
        return $this->hasMany(GbCounty::class);
    }
}