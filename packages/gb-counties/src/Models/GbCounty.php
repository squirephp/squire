<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Squire\Model;

class GbCounty extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code' => 'string',
        'name' => 'string',
        'region_id' => 'string',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}