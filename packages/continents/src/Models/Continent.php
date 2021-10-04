<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Squire\Model;

class Continent extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code' => 'string',
        'name' => 'string',
    ];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }

    public function regions(): HasManyThrough
    {
        return $this->hasManyThrough(Region::class, Country::class);
    }

    public function timezones(): HasManyThrough
    {
        return $this->hasManyThrough(Timezone::class, Country::class);
    }
}