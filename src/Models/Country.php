<?php

namespace Squire\Models;

use Squire\Model;

class Country extends Model
{
    protected $schema = [
        'calling_code' => 'string',
    ];

    protected $source = 'countries';

    public function airlines()
    {
        return $this->hasMany(Airline::class);
    }

    public function airports()
    {
        return $this->hasMany(Airport::class);
    }

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}