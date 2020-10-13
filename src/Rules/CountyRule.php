<?php

namespace Squire\Rules;

use Illuminate\Contracts\Validation\Rule;
use Squire\Models\Counties\GbCounty;

class CountyRule implements Rule
{
    const COUNTIES = [
        'gb' => GbCounty::class,
    ];

    protected $county;

    public function __construct($county)
    {
        if (!array_key_exists($county, COUNTIES)) {
            throw new \IllegalArgumentException("Unknown county code '$county'");
        }
        $this->county = $county;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return COUNTIES[$this->county]::whereId($value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unknown county';
    }
}
