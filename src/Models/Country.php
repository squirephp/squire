<?php

namespace Squire\Models;

use Squire\Model;

class Country extends Model
{
    protected $schema = [
        'calling_code' => 'string',
    ];

    protected $source = 'countries';
}