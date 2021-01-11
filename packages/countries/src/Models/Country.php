<?php

namespace Squire\Models;

use Squire\Model;

class Country extends Model
{
    public static $schema = [
        'id' => 'string',
        'calling_code' => 'string',
        'capital_city' => 'string',
        'code_2' => 'string',
        'code_3' => 'string',
        'continent_id' => 'string',
        'currency_id' => 'string',
        'flag' => 'string',
        'name' => 'string',
    ];

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