<?php

namespace Squire\Tests;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Squire\Models\Airline;
use Squire\Models\Airport;
use Squire\Models\Continent;
use Squire\Models\Country;
use Squire\Models\Currency;
use Squire\Models\GbCounty;
use Squire\Models\Region;
use Squire\Models\Timezone;
use Squire\Repository;
use Squire\Rules\AirlineRule;
use Squire\Rules\AirportRule;
use Squire\Rules\ContinentRule;
use Squire\Rules\CountryRule;
use Squire\Rules\CurrencyRule;
use Squire\Rules\GbCountyRule;
use Squire\Rules\RegionRule;
use Squire\Rules\TimezoneRule;

class RuleTest extends TestCase
{
    /** @test */
    public function can_be_validated(): void
    {
        Repository::registerSource(Models\Foo::class, App::getLocale(), __DIR__ . '/data/foo-en.csv');

        $this->testRule(Rules\FooRule::class, Models\Foo::class);

        $this->testRule(AirlineRule::class, Airline::class);
        $this->testRule(AirportRule::class, Airport::class);
        $this->testRule(ContinentRule::class, Continent::class);
        $this->testRule(CountryRule::class, Country::class);
        $this->testRule(CurrencyRule::class, Currency::class);
        $this->testRule(GbCountyRule::class, GbCounty::class);
        $this->testRule(RegionRule::class, Region::class);
        $this->testRule(TimezoneRule::class, Timezone::class);
    }

    protected function testRule(string $rule, string $model): void
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
