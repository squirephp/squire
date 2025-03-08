<?php

namespace Squire\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Squire\Model;

class Aircraft extends Model
{
    public static array $schema = [
        'id' => 'string',
        'code_iata' => 'string',
        'code_icao' => 'string',
        'name' => 'string',
    ];
}
