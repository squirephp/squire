<?php

namespace Squire\Rules;

use Illuminate\Contracts\Validation\Rule;
use Squire\Models\County;

class CountyRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return County::whereId($value)->exists();
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
