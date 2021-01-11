<?php

namespace Squire\Models;

use Squire\Model;

class GbCounty extends Model
{
    public static $schema = [
        'id' => 'string',
        'code' => 'string',
        'name' => 'string',
        'region_id' => 'string',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}