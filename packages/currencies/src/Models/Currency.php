<?php

namespace Squire\Models;

use Squire\Model;

class Currency extends Model
{
    public static $schema = [
        'id' => 'string',
        'code_alphabetic' => 'string',
        'code_numeric' => 'integer',
        'decimal_digits' => 'integer',
        'name' => 'string',
        'name_plural' => 'string',
        'rounding' => 'integer',
        'symbol' => 'string',
        'symbol_native' => 'string',
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}