<?php

namespace Squire\Tests;

use Squire\AirlinesEnServiceProvider;
use Squire\AirlinesServiceProvider;
use Squire\AirportsEnServiceProvider;
use Squire\AirportsServiceProvider;
use Squire\ContinentsDeServiceProvider;
use Squire\ContinentsEnServiceProvider;
use Squire\ContinentsServiceProvider;
use Squire\CountriesDeServiceProvider;
use Squire\CountriesEnServiceProvider;
use Squire\CountriesItServiceProvider;
use Squire\CountriesEsServiceProvider;
use Squire\CountriesFrServiceProvider;
use Squire\CountriesServiceProvider;
use Squire\CurrenciesEnServiceProvider;
use Squire\CurrenciesServiceProvider;
use Squire\GbCountiesEnServiceProvider;
use Squire\GbCountiesServiceProvider;
use Squire\RegionsEnServiceProvider;
use Squire\RegionsServiceProvider;
use Squire\RepositoryServiceProvider;
use Squire\TimezonesEnServiceProvider;
use Squire\TimezonesServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            AirlinesServiceProvider::class,
            AirlinesEnServiceProvider::class,
            AirportsServiceProvider::class,
            AirportsEnServiceProvider::class,
            ContinentsServiceProvider::class,
            ContinentsDeServiceProvider::class,
            ContinentsEnServiceProvider::class,
            CountriesServiceProvider::class,
            CountriesDeServiceProvider::class,
            CountriesEnServiceProvider::class,
            CountriesEsServiceProvider::class,
            CountriesItServiceProvider::class,
            CountriesFrServiceProvider::class,
            CurrenciesServiceProvider::class,
            CurrenciesEnServiceProvider::class,
            GbCountiesServiceProvider::class,
            GbCountiesEnServiceProvider::class,
            RegionsServiceProvider::class,
            RegionsEnServiceProvider::class,
            TimezonesServiceProvider::class,
            TimezonesEnServiceProvider::class,
            RepositoryServiceProvider::class,
        ];
    }
}
