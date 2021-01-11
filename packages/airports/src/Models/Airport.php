<?php

namespace Squire\Models;

use Squire\Model;

class Airport extends Model
{
    public static $schema = [
        'id' => 'string',
        'code_gps' => 'string',
        'code_iata' => 'string',
        'code_local' => 'string',
        'municipality' => 'string',
        'name' => 'string',
        'region_id' => 'string',
        'type' => 'string',
    ];

    public function country()
    {
        return $this->hasOneThrough(Country::class, Region::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}