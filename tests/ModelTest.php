<?php

namespace Squire\Tests;

use Illuminate\Support\Facades\App;
use Squire\Models\Currency;
use Squire\Repository;
use Squire\Tests\Models;

class ModelTest extends TestCase
{
    /** @test */
    public function can_query_models()
    {
        Repository::registerSource(Models\Foo::class, App::getLocale(), __DIR__.'/data/foo-en.csv');

        $this->assertEquals(2, Models\Foo::count());
        $this->assertEquals('bar', Models\Foo::first()->foo);

        $this->testModel(\Squire\Models\Airline::class);
        $this->testModel(\Squire\Models\Airport::class);
        $this->testModel(\Squire\Models\Continent::class);
        $this->testModel(\Squire\Models\Country::class);
        $this->testModel(\Squire\Models\Currency::class);
        $this->testModel(\Squire\Models\GbCounty::class);
        $this->testModel(\Squire\Models\Region::class);
    }

    /** @test */
    public function can_translate_models()
    {
        Repository::registerSource(Models\Foo::class, 'en', __DIR__.'/data/foo-en.csv');
        Repository::registerSource(Models\Foo::class, 'es', __DIR__.'/data/foo-es.csv');

        App::setLocale('en');
        $this->assertEquals('en', Models\Foo::first()->lang);

        Models\Foo::clearBootedModels();

        App::setLocale('es');
        $this->assertEquals('es', Models\Foo::first()->lang);
    }

    /** @test */
    public function can_format_usd()
    {
        $this->assertSame('$5.00', Currency::find('usd')->format(500));
        $this->assertSame('$500.00', Currency::find('usd')->format(500, true));
    }

    protected function testModel($model)
    {
        $locales = array_keys(Repository::getSources($model));

        foreach ($locales as $locale) {
            App::setLocale($locale);

            $model::clearBootedModels();

            $this->assertIsObject($model::all());
        }
    }
}