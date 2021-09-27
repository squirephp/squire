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

    public function format($number, $shouldConvert = false)
    {
        return (new \Akaunting\Money\Money(
            $number,
            (new \Akaunting\Money\Currency(strtoupper($this->id))),
            $shouldConvert
        ))->format();
    }
}