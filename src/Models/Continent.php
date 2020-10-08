<?php

namespace Squire\Models;

use Squire\Model;

class Continent extends Model
{
    protected $source = 'continents';

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function regions()
    {
        return $this->hasManyThrough(Region::class, Country::class);
    }
}