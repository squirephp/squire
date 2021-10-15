<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Squire\Model;

class Airport extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code_iata' => 'string',
        'code_icao' => 'string',
        'country_id' => 'string',
        'municipality' => 'string',
        'name' => 'string',
        'timezone_id' => 'string',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }
}