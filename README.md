<p align="center">
    <img src="https://user-images.githubusercontent.com/41773797/104140339-f54ce300-53a8-11eb-8049-8d0994a6cd36.png" alt="Package banner" style="width: 100%; max-width: 800px;" />
</p>

<p align="center">
    <a href="https://github.com/squirephp/squire/actions"><img alt="Tests passing" src="https://img.shields.io/badge/Tests-passing-green?style=for-the-badge&logo=github"></a>
    <a href="https://laravel.com"><img alt="Laravel v8.x" src="https://img.shields.io/badge/Laravel-v8.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="PHP 8" src="https://img.shields.io/badge/PHP-8-777BB4?style=for-the-badge&logo=php"></a>
</p>

Squire is a library of static Eloquent models for fixture data that is commonly needed in web applications, such as countries, currencies and airports. It's based on the concepts of [Caleb Porzio's Sushi package](https://github.com/calebporzio/sushi).

Common use cases for Squire include:
- Populating dropdown options, such as a country selector on an address form.
- Attaching extra data to other models in your app, such as airport information to a `Flight` model. See the section on [model relationships](#model-relationships).
- [Validating user input.](#validation)

## Contents

- [Installing a Model](#installing-a-model)
- [Using a Model](#using-a-model)
- [Available Models](#available-models)
  - [`Squire\Models\Airline`](#squiremodelsairline)
  - [`Squire\Models\Airport`](#squiremodelsairport)
  - [`Squire\Models\Continent`](#squiremodelscontinent)
  - [`Squire\Models\Country`](#squiremodelscountry)
  - [`Squire\Models\Currency`](#squiremodelscurrency)
    - [Formatting money](#formatting-money)
  - [`Squire\Models\GbCounty`](#squiremodelsgbcounty)
  - [`Squire\Models\Region`](#squiremodelsregion)
  - [`Squire\Models\Timezone`](#squiremodelstimezone)
- [Model Relationships](#model-relationships)
- [Validation](#validation)
- [Creating your own Models](#creating-your-own-models)
- [Upgrading from 1.x](#upgrading-from-1x)
- [Need Help?](#need-help)

## Installing a Model

You can use Composer to install Squire models into your application. Each model is available in a variety of languages, and you need only install the ones you will use.

As an example, you can install the `Squire\Models\Country` model in English:

```
composer require squirephp/countries-en
```

**A complete list of [available models](#available-models) is below.**

## Using a Model

You can interact with a Squire model just like you would any other Eloquent model, except that it only handles read-only operations.

```php
use Squire\Models\Country;

Country::all(); // Get information about all countries.

Country::find('us'); // Get information about the United States.

Country::where('name', 'like', 'a%')->get(); // Get information about all countries beginning with the letter "a".
```

## Available Models

### `Squire\Models\Airline`

#### Installation

| Locale | Installation Command |
|--|--|
| English | `composer require squirephp/airlines-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `alias` | Alternative name of the airline. | `EasyJet Airline` |
| `call_sign` | Call sign of the airline. | `EASY` |
| `code_iata` | [IATA code](https://en.wikipedia.org/wiki/List_of_airline_codes) of the airline. | `u2` |
| `code_icao` | [ICAO code](https://en.wikipedia.org/wiki/List_of_airline_codes) of the airline. |`ezy` |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the airline. | `gb` |
| `name` | Name of the airline. | `easyJet` |

#### Relationships

| Relationship name | Model |
|--|--|
| `country` | [`Squire\Models\Country`](#squiremodelscountry) |
| `continent` | [`Squire\Models\Continent`](#squiremodelscontinent) |


### `Squire\Models\Airport`

#### Installation

| Locale | Installation Command |
|--|--|
| English | `composer require squirephp/airports-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code_iata` | [IATA code](https://en.wikipedia.org/wiki/IATA_airport_code) of the airport. | `lhr` |
| `code_icao` | [ICAO code](https://en.wikipedia.org/wiki/ICAO_airport_code) of the airport. |`egll` |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the airport. | `gb` |
| `municipality` | Municipality of the airport. | `London` |
| `name` | Name of the airport. | `London Heathrow Airport` |
| `timezone_id` | [PHP timezone identifier](https://www.php.net/manual/en/timezones.php) of the airport. | `Europe/London` |

#### Relationships

| Relationship name | Model |
|--|--|
| `country` | [`Squire\Models\Country`](#squiremodelscountry) |
| `timezone` | [`Squire\Models\Timezone`](#squiremodelstimezone) |

### `Squire\Models\Continent`

#### Installation

| Locale | Installation Command |
|--|--|
| Arabic | `composer require squirephp/continents-ar` |
| German | `composer require squirephp/continents-de` |
| English | `composer require squirephp/continents-en` |
| Polish | `composer require squirephp/continents-pl` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code` | Two letter continent code. | `na` |
| `name` | Continent name. | `North America` |

#### Relationships

| Relationship name | Model |
|--|--|
| `countries` | [`Squire\Models\Country`](#squiremodelscountry) |
| `regions` | [`Squire\Models\Region`](#squiremodelsregion) |
| `timezones` | [`Squire\Models\Timezone`](#squiremodelstimezone) |

### `Squire\Models\Country`

#### Installation

| Locale | Installation Command |
|--|--|
| Arabic | `composer require squirephp/countries-ar` |
| English | `composer require squirephp/countries-en` |
| French | `composer require squirephp/countries-fr` |
| German | `composer require squirephp/countries-de` |
| Polish | `composer require squirephp/countries-pl` |
| Spanish | `composer require squirephp/countries-es` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `calling_code` | [E.164](https://en.wikipedia.org/wiki/E.164) country calling code. | `1` |
| `capital_city` | Capital city of the country. | `Washington` |
| `code_2` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). | `us` |
| `code_3` | [ISO 3166-1 alpha-3 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3). | `usa` |
| `continent_id` | Two letter continent code of the country. | `na` |
| `currency_id` | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) alphabetic currency code of the country. | `usd` |
| `flag` | Unicode flag of the country. | `🇺🇸` |
| `name` | Country name. | `United States` |

#### Relationships

| Relationship name | Model |
|--|--|
| `airlines` | [`Squire\Models\Airline`](#squiremodelsairline) |
| `airports` | [`Squire\Models\Airport`](#squiremodelsairport) |
| `continent` | [`Squire\Models\Continent`](#squiremodelscontinent) |
| `currency` | [`Squire\Models\Currency`](#squiremodelscurrency) |
| `regions` | [`Squire\Models\Region`](#squiremodelsregion) |
| `timezones` | [`Squire\Models\Timezone`](#squiremodelstimezone) |

### `Squire\Models\Currency`

#### Installation

| Locale | Installation Command |
|--|--|
| Arabic | `composer require squirephp/currencies-ar` |
| English | `composer require squirephp/currencies-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code_alphabetic` | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) alphabetic currency code. | `usd` |
| `code_numeric` | [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) numeric currency code. | `840` |
| `decimal_digits` | Number of decimal digits to use when formatting this currency. | `2` |
| `name` | Currency name. | `US Dollar` |
| `name_plural` | Plural currency name. | `US Dollars` |
| `rounding` | The formatting precison of this currency. | `0` |
| `symbol` | International currency symbol. | `$` |
| `symbol_native` | Native currency symbol. | `$` |

#### Relationships

| Relationship name | Model |
|--|--|
| `countries` | [`Squire\Models\Country`](#squiremodelscountry) |

#### Formatting money

You may use the `format()` method on any currency model instance to format a given number in that currency:

```php
Currency::find('usd')->format(500) // $5.00
Currency::find('usd')->format(500, true) // $500.00, converted
```

This functionality uses [`akaunting/laravel-money`](https://github.com/akaunting/laravel-money) internally.

### `Squire\Models\GbCounty`

#### Installation

| Locale | Installation Command |
|--|--|
| English | `composer require squirephp/gb-counties-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code` | [ISO 3166-2 county code](https://en.wikipedia.org/wiki/ISO_3166-2). | `gb-ess` |
| `name` | County name. | `Essex` |
| `region_id` | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2) of the county. | `gb-eng` |

#### Relationships

| Relationship name | Model |
|--|--|
| `region` | [`Squire\Models\Region`](#squiremodelsregion) |

### `Squire\Models\Region`

#### Installation

| Locale | Installation Command |
|--|--|
| English | `composer require squirephp/regions-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code` | [ISO 3166-2 region code](https://en.wikipedia.org/wiki/ISO_3166-2). | `us-ny` |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). | `us` |
| `name` | Region name. | `New York` |

#### Relationships

| Relationship name | Model |
|--|--|
| `continent` | [`Squire\Models\Continent`](#squiremodelscontinent) |
| `country` | [`Squire\Models\Country`](#squiremodelscountry) |
| `gbCounties` | [`Squire\Models\GbCounty`](#squiremodelsgbcounty) |

### `Squire\Models\Timezone`

#### Installation

| Locale | Installation Command |
|--|--|
| English | `composer require squirephp/timezones-en` |

#### Schema

| Column Name | Description | Example |
|--|--|--|
| `code` | [PHP timezone identifier](https://www.php.net/manual/en/timezones.php). | `America/New_York` |
| `country_id` | [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). | `us` |
| `long_name` | Full timezone name. | `America/New York` |
| `name` | Short timezone name. | `New York` |

#### Relationships

| Relationship name | Model |
|--|--|
| `airports` | [`Squire\Models\Airport`](#squiremodelsairport) |
| `continent` | [`Squire\Models\Continent`](#squiremodelscontinent) |
| `country` | [`Squire\Models\Country`](#squiremodelscountry) |

#### Methods

| Method name | Description |
|--|--|
| `getOffset($dateTime)` | Returns the timezone offset from GMT. |

## Model Relationships

Implementing an Eloquent relationship between a model in your app and a Squire model is very simple. There are a couple of approaches you could take.

### Using Inheritance

The simplest option is to create a new model in your app, and let it extend the Squire model. Your new app model will now behave like the original Squire model, except you can register new methods and customise it to your liking:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Squire\Models\Country as SquireCountry;

class Country extends SquireCountry
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
```

### Using `resolveRelationUsing()`

Another option is the `resolveRelationUsing()` method. This allows you to dynamically register a relationship for a Squire model from anywhere in your app, for example, within a service provider:

```php
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Squire\Models\Country;

Country::resolveRelationUsing('users', function (Country $country): HasMany {
    return $country->hasMany(User::class);
});
```

## Validation

Squire includes a validation rule for each model installed in your app. These allow you to easily validate user input to ensure that it matches a record in a specific model.

Rules can be found in the `Squire\Rules` namespace. To use one, simply construct a new rule class and pass in the model column name that you would like to validate against:

```php
use Squire\Rules;

$request->validate([
    'country' => ['required', 'string', new Rules\CountryRule('name')],
]);
```

This code will validate the `country` input against the `name` column on the [`Squire\Models\Country` model](#squiremodelscountry). If the user enters a country that does not exist, a validation error will be thrown.

## Creating your own Models

Squire may not always have a model available for the information you require. In this case, you may want to create your own.

### Creating a Model

Squire models are very simple classes that extend `Squire\Model`. Install it with:

```
composer require squirephp/model
```

Your model class should contain a single static property, `$schema`. This contains the column structure for your model, and should match the format of the source data.

```php
<?php

namespace App\Models;

use Squire\Model;

class Language extends Model
{
    public static array $schema = [
        'id' => 'string',
        'name' => 'string',
    ];
}
```

### Attaching a Model Source

Your model will require at least one data source to be registered. Each registered data source is associated with a locale. To register a data source, you will need to interact with `Squire\Repository`. Install it with:

```
composer require squirephp/repository
```

Inside a service provider, register an English source for your model:

```php
<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;
use Squire\Repository;

class ModelServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Language::class, 'en', __DIR__ . '/../../resources/squire-data/languages-en.csv');
    }
}
```

In this example, the `/resources/squire-data/languages-en.csv` file should be present in your app, and contain the English data served to the model. The column structure should match the `$schema` defined in your model:

```csv
id,name
de,German
en,English
fr,French
es,Spanish
```

### Creating a Validation Rule

[Rules](#validation) allow you to validate user input to ensure that it matches a record in a specific model. Rule classes extend `Squire\Rule`. Install it with:

```
composer require squirephp/rule
```

Your rule class should contain, at minimum, a `$message` to be served if the validation fails, and a `getQueryBuilder()` method for your model.

```php
<?php

namespace App\Rules;

use App\Models;
use Illuminate\Database\Eloquent\Builder;
use Squire\Rule;

class LanguageRule extends Rule
{
    protected string $message = 'validation.language';

    protected function getQueryBuilder(): Builder
    {
        return Models\Language::query();
    }
}
```

If no column is passed to your rule when it's used, `id` will be used by default. To customise this, override the `$column` property on your rule:

```php
<?php

namespace App\Rules;

use Squire\Rule;

class Language extends Rule
{
    protected string $column = 'name';
}
```

### Releasing a Model

Squire models, their sources, and validation rules are all simply releasable in Composer packages. To see an example of this in action, check out the [`squirephp/countries`](https://github.com/squirephp/countries) and [`squirephp/countries-en`](https://github.com/squirephp/countries-en) packages.

## Upgrading from 2.x

If you're using any validation rules, they are now all end with `Rule`. This allows both the model and rule to be imported into the same class without the use of aliasing:

2.x:

```php
use Squire\Models\Country;
use Squire\Rules\Country as CountryRule;

Country::find('us');

$request->validate([
    'country' => ['required', 'string', new CountryRule('name')],
]);
```

3.x:

```php
use Squire\Models\Country;
use Squire\Rules\CountryRule;

Country::find('us');

$request->validate([
    'country' => ['required', 'string', new CountryRule('name')],
]);
```

All properties and methods in [custom models](#creating-a-model) and [custom validation rules](#creating-a-validation-rule) now need to have the correct types. These can be found in the relevant section of the documentation.

### Breaking Changes Introduced in 3.x

- The minimum PHP version has been bumped to v8.0, and the minimum Laravel version to v8.x.
- Validation rules have been renamed, so they all end with `Rule`. This allows both the model and rule to be imported into the same class without the use of aliasing.
- Types have been introduced to all classes. If you have created [custom models](#creating-a-model) and [custom validation rules](#creating-a-validation-rule), properties and methods now need to use the correct types.
- The primary key of airports is now their ICAO code. The region relationship has been removed and replaced with country. The local code has been removed.
- Empty string values are now null.

## Need Help?

🐞 If you spot a bug with this package, please [submit a detailed issue](https://github.com/squirephp/squire/issues/new), and wait for assistance.

🤔 If you have a question or feature request, please [start a new discussion](https://github.com/squirephp/squire/discussions/new).

🔐 If you discover a vulnerability within the package, please review our [security policy](https://github.com/squirephp/squire/blob/main/SECURITY.md).
