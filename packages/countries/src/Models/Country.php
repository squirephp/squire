<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Squire\Model;

class Country extends Model
{
    public static array $schema = [
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

    public function airlines(): HasMany
    {
        return $this->hasMany(Airline::class);
    }

    public function airports(): HasMany
    {
        return $this->hasMany(Airport::class);
    }

    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }

    public function timezones(): HasMany
    {
        return $this->hasMany(Timezone::class);
    }
}
