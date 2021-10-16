<?php

namespace Squire\Tests\Rules;

use Illuminate\Database\Eloquent\Builder;
use Squire\Rule;
use Squire\Tests\Models;

class FooRule extends Rule
{
    public string $column = 'foo';

    protected string $message = 'squire-foo::validation.foo';

    protected function getQueryBuilder(): Builder
    {
        return Models\Foo::query();
    }
}
