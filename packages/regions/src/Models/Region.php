<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Squire\Model;

class Region extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code' => 'string',
        'country_id' => 'string',
        'name' => 'string',
    ];

    public function continent(): HasOneThrough
    {
        return $this->hasOneThrough(Continent::class, Country::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function gbCounties(): HasMany
    {
        return $this->hasMany(GbCounty::class);
    }
}
