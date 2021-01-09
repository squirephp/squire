<?php

namespace Squire\Models;

use Squire\Model;

class Currency extends Model
{
    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}