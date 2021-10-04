<?php

namespace Squire\Models;

use DateTimeInterface;
use DateTimeZone;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Squire\Model;

class Timezone extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code' => 'string',
        'country_id' => 'string',
        'long_name' => 'string',
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

    public function getOffset(DateTimeInterface $dateTime): int|false|null
    {
        if (! $this->id) {
            return null;
        }

        return (new DateTimeZone($this->id))->getOffset($dateTime);
    }
}