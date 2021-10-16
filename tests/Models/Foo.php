<?php

namespace Squire\Tests\Models;

use Squire\Model;

class Foo extends Model
{
    public static array $schema = [
        'foo' => 'string',
        'lang' => 'string',
    ];
}
