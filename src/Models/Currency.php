<?php

namespace Squire\Models;

use Squire\Model;

class Currency extends Model
{
    protected $source = 'currencies';

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}