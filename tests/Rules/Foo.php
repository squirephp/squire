<?php

namespace Squire\Tests\Rules;

use Squire\Tests\Models;
use Squire\Rule;

class Foo extends Rule
{
    public $column = 'foo';

    protected $message = 'squire-foo::validation.foo';

    protected function getQueryBuilder()
    {
        return Models\Foo::query();
    }
}