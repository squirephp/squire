<?php

namespace Squire\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \Squire\AirlinesServiceProvider::class,
            \Squire\AirlinesEnServiceProvider::class,
            \Squire\AirportsServiceProvider::class,
            \Squire\AirportsEnServiceProvider::class,
            \Squire\ContinentsServiceProvider::class,
            \Squire\ContinentsDeServiceProvider::class,
            \Squire\ContinentsEnServiceProvider::class,
            \Squire\ContinentsEsServiceProvider::class,
            \Squire\ContinentsFrServiceProvider::class,
            \Squire\CountriesServiceProvider::class,
            \Squire\CountriesEnServiceProvider::class,
            \Squire\CurrenciesServiceProvider::class,
            \Squire\CurrenciesEnServiceProvider::class,
            \Squire\GbCountiesServiceProvider::class,
            \Squire\GbCountiesEnServiceProvider::class,
            \Squire\RegionsServiceProvider::class,
            \Squire\RegionsEnServiceProvider::class,
            \Squire\RepositoryServiceProvider::class,
        ];
    }
}