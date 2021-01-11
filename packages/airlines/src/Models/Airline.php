<?php

namespace Squire\Models;

use Squire\Model;

class Airline extends Model
{
    public static $schema = [
        'id' => 'string',
        'alias' => 'string',
        'call_sign' => 'string',
        'code_iata' => 'string',
        'code_icao' => 'string',
        'country_id' => 'string',
        'name' => 'string',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function continent()
    {
        return $this->hasOneThrough(Continent::class, Country::class);
    }
}