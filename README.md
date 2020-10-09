# Laravel Squire 📜

[![CI status](https://github.com/danharrin/squire/workflows/run-tests/badge.svg)](https://github.com/danharrin/squire/actions)

Squire is a library of static Eloquent models for fixture data that is commonly needed in web applications, such as countries, currencies and airports. It's built on top of [Caleb Porzio's Sushi package](https://github.com/calebporzio/sushi).

Common use cases for Squire include:

- Populating dropdown options, such as a country selector on an address form.
- Attaching extra data to other models in your app, such as airport information to a `Flight` model. See the section on [model relationships](#model-relationships).

## Contents

- [Installing Squire](#installing-squire)
- [Using a model](#using-a-model)
- [Available models](#available-models)
  - [`Squire\Models\Airline`](#squiremodelsairline)
  - [`Squire\Models\Airport`](#squiremodelsairport)
  - [`Squire\Models\Continent`](#squiremodelscontinent)
  - [`Squire\Models\Counties\GbCounty`](#squiremodelscountiesgbcounty)
  - [`Squire\Models\Country`](#squiremodelscountry)
  - [`Squire\Models\Currency`](#squiremodelscurrency)
  - [`Squire\Models\Provinces\ItProvince`](#squiremodelsprovincesitprovince)
  - [`Squire\Models\Region`](#squiremodelsregion)
- [Model relationships](#model-relationships)
- [Column customisation](#column-customisation)
- [Contributing](#contributing)

## Installing Squire

You can use Composer to install Squire into your application.

```
composer require danharrin/squire
```

No additional setup is required.

## Using a model

You can interact with a Squire model just like you would any other Eloquent model, except that it only handles read-only operations.

```php
use Squire\Models\Country;

Country::all(); // Get information about all countries.

Country::find('us'); // Get information about the United States.

Country::where('name', 'like', 'a%')->get(); // Get information about all countries beginning with the letter "a".
```

## Available models

### `Squire\Models\Airline`

| Column Name  | Description                                                                                         | Example           |
| ------------ | --------------------------------------------------------------------------------------------------- | ----------------- |
| `alias`      | Alternative name of the airline.                                                                    | `EasyJet Airline` |
| `call_sign`  | Call sign of the airline.                                                                           | `EASY`            |
| `code_iata`  | [IATA code](https://en.wikipedia.org/wiki/List_of_airline_codes) of the airline.                    | `u2`              |
| `code_icao`  | [ICAO code](https://en.wikipedia.org/wiki/List_of_airline_codes) of the airline.                    | `ezy`             |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the airline. | `gb`              |
| `name`       | Name of the airline.                                                                                | `easyJet`         |

| Relationship name | Model                                               |
| ----------------- | --------------------------------------------------- |
| `country`         | [`Squire\Models\Country`](#squiremodelscountry)     |
| `continent`       | [`Squire\Models\Continent`](#squiremodelscontinent) |

### `Squire\Models\Airport`

| Column Name    | Description                                                                        | Example           |
| -------------- | ---------------------------------------------------------------------------------- | ----------------- |
| `code_gps`     | GPS code of the airport.                                                           | `ayse`            |
| `code_iata`    | [IATA code](https://en.wikipedia.org/wiki/IATA_airport_code) of the airport.       | `nis`             |
| `code_icao`    | Local code of the airport.                                                         | `sbi`             |
| `municipality` | Municipality of the airport.                                                       | `Simberi Island`  |
| `name`         | Name of the airport.                                                               | `Simberi Airport` |
| `region_id`    | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2) of the airport. | `pg-nik`          |
| `type`         | Type of airport.                                                                   | `small_airport`   |

| Relationship name | Model                                           |
| ----------------- | ----------------------------------------------- |
| `country`         | [`Squire\Models\Country`](#squiremodelscountry) |
| `region`          | [`Squire\Models\Region`](#squiremodelsregion)   |

### `Squire\Models\Continent`

| Column Name | Description                | Example         |
| ----------- | -------------------------- | --------------- |
| `code`      | Two letter continent code. | `na`            |
| `name`      | Continent name.            | `North America` |

| Relationship name | Model                                           |
| ----------------- | ----------------------------------------------- |
| `countries`       | [`Squire\Models\Country`](#squiremodelscountry) |
| `regions`         | [`Squire\Models\Region`](#squiremodelsregion)   |

### `Squire\Models\Counties\GbCounty`

| Column Name | Description                                                                       | Example  |
| ----------- | --------------------------------------------------------------------------------- | -------- |
| `code`      | [ISO 3166-2 county code](https://en.wikipedia.org/wiki/ISO_3166-2).               | `gb-ess` |
| `name`      | County name.                                                                      | `Essex`  |
| `region_id` | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2) of the county. | `gb-eng` |

| Relationship name | Model                                         |
| ----------------- | --------------------------------------------- |
| `region`          | [`Squire\Models\Region`](#squiremodelsregion) |

### `Squire\Models\Country`

| Column Name    | Description                                                                                 | Example         |
| -------------- | ------------------------------------------------------------------------------------------- | --------------- |
| `calling_code` | [E.164](https://en.wikipedia.org/wiki/E.164) country calling code.                          | `1`             |
| `capital_city` | Capital city of the country.                                                                | `Washington`    |
| `code_2`       | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).        | `us`            |
| `code_3`       | [ISO 3166-1 alpha-3 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3).        | `usa`           |
| `continent_id` | Two letter continent code of the country.                                                   | `na`            |
| `currency_id`  | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) alphabetic currency code of the country. | `usd`           |
| `flag`         | Unicode flag of the country.                                                                | `🇺🇸`            |
| `name`         | Country name.                                                                               | `United States` |

| Relationship name | Model                                               |
| ----------------- | --------------------------------------------------- |
| `airlines`        | [`Squire\Models\Airline`](#squiremodelsairline)     |
| `airports`        | [`Squire\Models\Airport`](#squiremodelsairport)     |
| `continent`       | [`Squire\Models\Continent`](#squiremodelscontinent) |
| `currency`        | [`Squire\Models\Currency`](#squiremodelscurrency)   |
| `regions`         | [`Squire\Models\Region`](#squiremodelsregion)       |

### `Squire\Models\Currency`

| Column Name       | Description                                                                  | Example         |
| ----------------- | ---------------------------------------------------------------------------- | --------------- |
| `code_alphabetic` | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) alphabetic currency code. | `usd`           |
| `code_numeric`    | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) numeric currency code.    | `840`           |
| `decimal_digits`  | Number of decimal digits to use when formatting this currency.               | `United States` |
| `name`            | Currency name.                                                               | `US Dollar`     |
| `name_plural`     | Plural currency name.                                                        | `US Dollars`    |
| `rounding`        | The formatting precison of this currency.                                    | `0`             |
| `symbol`          | International currency symbol.                                               | `$`             |
| `symbol_native`   | Native currency symbol.                                                      | `$`             |

| Relationship name | Model                                           |
| ----------------- | ----------------------------------------------- |
| `countries`       | [`Squire\Models\Country`](#squiremodelscountry) |

### `Squire\Models\Provinces\ItProvince`

| Column Name | Description                                                                         | Example  |
| ----------- | ----------------------------------------------------------------------------------- | -------- |
| `code`      | [ISO 3166-2 province code](https://en.wikipedia.org/wiki/ISO_3166-2).               | `it-pd`  |
| `name`      | Province name.                                                                      | `Padova` |
| `region_id` | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2) of the province. | `it-34`  |

| Relationship name | Model                                         |
| ----------------- | --------------------------------------------- |
| `region`          | [`Squire\Models\Region`](#squiremodelsregion) |

### `Squire\Models\Region`

| Column Name  | Description                                                                          | Example    |
| ------------ | ------------------------------------------------------------------------------------ | ---------- |
| `code`       | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2).                  | `us-ny`    |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). | `us`       |
| `name`       | Region name.                                                                         | `New York` |

| Relationship name | Model                                                                |
| ----------------- | -------------------------------------------------------------------- |
| `airports`        | [`Squire\Models\Airport`](#squiremodelsairport)                      |
| `continent`       | [`Squire\Models\Continent`](#squiremodelscontinent)                  |
| `country`         | [`Squire\Models\Country`](#squiremodelscountry)                      |
| `gbCounties`      | [`Squire\Models\County\GbCounty`](#squiremodelscountiesgbcounty)     |
| `itProvinces`      | [`Squire\Models\County\GbCounty`](#squiremodelsprovincesitprovince) |

## Model relationships

Implementing an Eloquent relationship between a model in your app and a Squire model is very simple. There are a couple of approaches you could take.

### Using inheritance

The simplest option is to create a new model in your app, and let it extend the Squire model. Your new app model will now behave like the original Squire model, except you can register new methods and customise it to your liking:

```php
<?php

namespace App\Models;

use Squire\Models\Country as SquireCountry;

class Country extends SquireCountry
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
```

See our section on [model customisation](#column-customisation) for more customisation possibilities that are made available if you utilise this method.

### Using `resolveRelationUsing()`

Another option is the `resolveRelationUsing()` method. This allows you to dynamically register a relationship for a Squire model from anywhere in your app, for example, within a service provider:

```php
use App\Models\User;
use Squire\Models\Country;

Country::resolveRelationUsing('users', function (Country $country) {
    return $country->hasMany(User::class);
});
```

## Column customisation

Squire allows you to customise the column names on any provided model.

Create a new model within your app and let it extend the Squire model that you would like to customise:

```php
<?php

namespace App\Models;

use Squire\Models\Country as SquireCountry;

class Country extends SquireCountry
{
    protected $map = [
        'dial_code' => 'calling_code',
    ];
}
```

In this example, the `App\Models\Country`, extending the `Squire\Models\Country` model, has the `calling_code` column remapped to `dial_code`:

```php
use App\Models\Country;

Country::find('us')->dial_code; // 1
```

## Contributing

If you have fixture data to contribute to the library, please open a pull request!

For reference, check out the existing models.
