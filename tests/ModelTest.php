<?php

namespace Squire\Tests;

use Illuminate\Support\Facades\App;
use Squire\Model;
use Squire\Models;
use Squire\Repository;

class ModelTest extends TestCase
{
    /** @test */
    public function basic_usage()
    {
        Repository::registerSource(Foo::class, App::getLocale(), __DIR__.'/data/foo.csv');

        $this->assertEquals(Foo::count(), 2);
        $this->assertEquals(Foo::first()->foo, 'bar');
        $this->assertEquals(Foo::where('bob', 'law')->first()->foo, 'baz');
    }

    /** @test */
    public function custom_column_map()
    {
        Repository::registerSource(Bar::class, App::getLocale(), __DIR__.'/data/bar.csv');

        $this->assertEquals(Bar::first()->new_foo, 'bar');
        $this->assertEquals(Bar::where('new_bob', 'law')->first()->new_foo, 'baz');
    }

    /** @test */
    public function custom_column_map_and_schema()
    {
        Repository::registerSource(Baz::class, App::getLocale(), __DIR__.'/data/baz.csv');

        $this->assertEquals(Baz::first()->new_foo, '1.0');
        $this->assertEquals(Baz::first()->new_bob, '1');
    }

    /** @test */
    public function models()
    {
        $this->assertIsObject(Models\Airline::first());
        $this->assertIsObject(Models\Airport::first());
        $this->assertIsObject(Models\Continent::first());
        $this->assertIsObject(Models\Country::first());
        $this->assertIsObject(Models\Currency::first());
        $this->assertIsObject(Models\GbCounty::first());
        $this->assertIsObject(Models\Region::first());
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