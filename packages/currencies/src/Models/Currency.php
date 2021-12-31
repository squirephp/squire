<?php

namespace Squire\Models;

use Akaunting\Money;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Squire\Model;

class Currency extends Model
{
    public static array $schema = [
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

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }

    public function format(float $number, bool $shouldConvert = false): string
    {
        return (new Money\Money(
            $number,
            (new Money\Currency(strtoupper($this->id))),
            $shouldConvert
        ))->format();
    }
}
