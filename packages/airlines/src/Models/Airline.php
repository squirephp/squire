<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Squire\Model;

class Airline extends Model
{
    public static array $schema = [
        'id' => 'string',
        'alias' => 'string',
        'call_sign' => 'string',
        'code_iata' => 'string',
        'code_icao' => 'string',
        'country_id' => 'string',
        'name' => 'string',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function continent(): BelongsTo
    {
        return $this->hasOneThrough(Continent::class, Country::class);
    }
}
