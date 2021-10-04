<?php

namespace Squire\Tests;

use Illuminate\Support\Facades\App;
use Squire\Models\Airline;
use Squire\Models\Airport;
use Squire\Models\Continent;
use Squire\Models\Country;
use Squire\Models\Currency;
use Squire\Models\GbCounty;
use Squire\Models\Region;
use Squire\Models\Timezone;
use Squire\Repository;
use Squire\Tests\Models;

class ModelTest extends TestCase
{
    /** @test */
    public function can_query_models(): void
    {
        Repository::registerSource(Models\Foo::class, App::getLocale(), __DIR__ . '/data/foo-en.csv');

        $this->assertEquals(2, Models\Foo::count());
        $this->assertEquals('bar', Models\Foo::first()->foo);

        $this->testModel(Airline::class);
        $this->testModel(Airport::class);
        $this->testModel(Continent::class);
        $this->testModel(Country::class);
        $this->testModel(Currency::class);
        $this->testModel(GbCounty::class);
        $this->testModel(Region::class);
        $this->testModel(Timezone::class);
    }

    protected function testModel(string $model): void
    {
        $locales = array_keys(Repository::getSources($model));

        foreach ($locales as $locale) {
            App::setLocale($locale);

            $model::clearBootedModels();

            $this->assertIsObject($model::all());
        }
    }

    /** @test */
    public function can_translate_models(): void
    {
        Repository::registerSource(Models\Foo::class, 'en', __DIR__ . '/data/foo-en.csv');
        Repository::registerSource(Models\Foo::class, 'es', __DIR__ . '/data/foo-es.csv');

        App::setLocale('en');
        $this->assertEquals('en', Models\Foo::first()->lang);

        Models\Foo::clearBootedModels();

        App::setLocale('es');
        $this->assertEquals('es', Models\Foo::first()->lang);
    }

    /** @test */
    public function can_format_usd(): void
    {
        $this->assertSame('$5.00', Currency::find('usd')->format(500));
        $this->assertSame('$500.00', Currency::find('usd')->format(500, true));
    }
}