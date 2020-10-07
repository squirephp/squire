<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use Squire\Model;

class SquireTest extends TestCase
{
    /** @test */
    function basic_usage()
    {
        $this->assertEquals(Foo::count(), 2);
        $this->assertEquals(Foo::first()->foo, 'bar');
        $this->assertEquals(Foo::where('bob', 'law')->first()->foo, 'baz');
    }

    /** @test */
    function custom_column_map()
    {
        $this->assertEquals(Bar::first()->new_foo, 'bar');
        $this->assertEquals(Bar::where('new_bob', 'law')->first()->new_foo, 'baz');
    }

    /** @test */
    function custom_column_map_and_schema()
    {
        $this->assertEquals(Baz::first()->new_foo, '1.0');
        $this->assertEquals(Baz::first()->new_bob, '1');
    }
}

class Foo extends Model
{
    protected $rawData = [
        ['foo' => 'bar', 'bob' => 'lob'],
        ['foo' => 'baz', 'bob' => 'law'],
    ];
}

class Bar extends Model
{
    protected $map = [
        'new_foo' => 'foo',
        'new_bob' => 'bob',
    ];

    protected $rawData = [
        ['foo' => 'bar', 'bob' => 'lob'],
        ['foo' => 'baz', 'bob' => 'law'],
    ];
}

class Baz extends Model
{
    protected $map = [
        'new_foo' => 'foo',
        'new_bob' => 'bob',
    ];

    protected $rawData = [
        ['foo' => '1.0', 'bob' => '1.0'],
    ];

    protected $schema = [
        'bob' => 'integer',
    ];
}