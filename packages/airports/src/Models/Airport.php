<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Squire\Model;

class Airport extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code_gps' => 'string',
        'code_iata' => 'string',
        'code_local' => 'string',
        'municipality' => 'string',
        'name' => 'string',
        'region_id' => 'string',
        'type' => 'string',
    ];

    public function country(): HasOneThrough
    {
        return $this->hasOneThrough(Country::class, Region::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}