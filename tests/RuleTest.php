<?php

namespace Squire\Tests;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Squire\Repository;
use Squire\Tests\Models;
use Squire\Tests\Rules;

class RuleTest extends TestCase
{
    /** @test */
    public function can_be_validated()
    {
        Repository::registerSource(Models\Foo::class, App::getLocale(), __DIR__.'/data/foo-en.csv');

        $this->testRule(Rules\Foo::class, Models\Foo::class);

        $this->testRule(\Squire\Rules\Airline::class, \Squire\Models\Airline::class);
        $this->testRule(\Squire\Rules\Airport::class, \Squire\Models\Airport::class);
        $this->testRule(\Squire\Rules\Continent::class, \Squire\Models\Continent::class);
        $this->testRule(\Squire\Rules\Country::class, \Squire\Models\Country::class);
        $this->testRule(\Squire\Rules\Currency::class, \Squire\Models\Currency::class);
        $this->testRule(\Squire\Rules\GbCounty::class, \Squire\Models\GbCounty::class);
        $this->testRule(\Squire\Rules\Region::class, \Squire\Models\Region::class);
    }

    protected function testRule($rule, $model)
    {
        $primaryKey = array_keys($model::$schema)[0];
        $secondaryKey = array_keys($model::$schema)[1];

        $this->assertTrue(Validator::make([
            $primaryKey => $model::first()->{$primaryKey},
            $secondaryKey => $model::first()->{$secondaryKey},
        ], [
            $primaryKey => [new $rule()],
            $secondaryKey => [new $rule($secondaryKey)],
        ])->passes());

        $this->assertTrue(Validator::make([
            $primaryKey => null,
            $secondaryKey => null,
        ], [
            $primaryKey => [new $rule()],
            $secondaryKey => [new $rule($secondaryKey)],
        ])->fails());
    }
}