<?php

namespace Squire\Tests;

use Squire\AirlinesEnServiceProvider;
use Squire\AirlinesServiceProvider;
use Squire\AirportsEnServiceProvider;
use Squire\AirportsServiceProvider;
use Squire\ContinentsArServiceProvider;
use Squire\ContinentsDeServiceProvider;
use Squire\ContinentsEnServiceProvider;
use Squire\ContinentsPlServiceProvider;
use Squire\ContinentsServiceProvider;
use Squire\CountriesArServiceProvider;
use Squire\CountriesDeServiceProvider;
use Squire\CountriesEnServiceProvider;
use Squire\CountriesEsServiceProvider;
use Squire\CountriesFrServiceProvider;
use Squire\CountriesPlServiceProvider;
use Squire\CountriesServiceProvider;
use Squire\CurrenciesArServiceProvider;
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
        return array(
            AirlinesServiceProvider::class,
            AirlinesEnServiceProvider::class,
            AirportsServiceProvider::class,
            AirportsEnServiceProvider::class,
            ContinentsServiceProvider::class,
            ContinentsArServiceProvider::class,
            ContinentsDeServiceProvider::class,
            ContinentsEnServiceProvider::class,
            ContinentsPlServiceProvider::class,
            CountriesServiceProvider::class,
            CountriesArServiceProvider::class,
            CountriesDeServiceProvider::class,
            CountriesEnServiceProvider::class,
            CountriesEsServiceProvider::class,
            CountriesFrServiceProvider::class,
            CountriesPlServiceProvider::class,
            CurrenciesServiceProvider::class,
            CurrenciesEnServiceProvider::class,
            CurrenciesArServiceProvider::class,
            GbCountiesServiceProvider::class,
            GbCountiesEnServiceProvider::class,
            RegionsServiceProvider::class,
            RegionsEnServiceProvider::class,
            TimezonesServiceProvider::class,
            TimezonesEnServiceProvider::class,
            RepositoryServiceProvider::class,
        );
    }
}
