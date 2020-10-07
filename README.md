# Laravel Squire

Squire is a collection of static Eloquent models for fixture data that is commonly needed in web applications, such as countries, currencies and airports. It's built on top of [Caleb Porzio's Sushi package](https://github.com/calebporzio/sushi).

Common use cases for Squire include:
- Populating dropdown options, such as a country selector on an address form.
- Attaching extra data to other models in your app, such as airport information to a `Flight` model. See the section on [model relationships](#model-relationships).

[![CI Status](https://github.com/danharrin/squire/workflows/run-tests/badge.svg)](https://github.com/danharrin/squire/actions)
[![Total Downloads(https://packagist.org/packages/danharrin/squire)](https://poser.pugx.org/danharrin/squire/d/total.svg)
[![Latest Stable Version](https://packagist.org/packages/danharrin/squire")](https://poser.pugx.org/danharrin/squire/v/stable.svg)
[![License](https://packagist.org/packages/danharrin/squire")](https://poser.pugx.org/danharrin/squire/license.svg)

## Installing Squire

You can use Composer to install Squire into your application.

```
composer require danharrin/squire
```

No additional setup is required.

## Using a model

You are able to interact with a Squire model just like you would any other Eloquent model, except it can only handle read-only operations.

```php
use Squire\Models\Country;

Country::all(); // Get information about all countries.

Country::find('us'); // Get information about the United States.

Country::where('name', 'like', 'a%')->get(); // Get information about all countries beginning with the letter "a".
```

## Available models

### `Squire\Models\Country`

| Column Name    | Description                                                                          | Example         | Notes       |
|----------------|--------------------------------------------------------------------------------------|-----------------|-------------|
| `id`           | [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code. | `us`            | Primary key |
| `calling_code` | [E.164](https://en.wikipedia.org/wiki/E.164) country calling code.                   | `1`             |             |
| `name`         | Country name.                                                                        | `United States` |             |

## Model relationships

Implementing an Eloquent relationship between a model in your app and a Squire model is very simple. There are a couple of approaches you could take.

### Using inheritance

The simplest option is to create a new model in your app, and let it extend the Squire model. Your new app model will now behave like the original Squire model, except you are able to register new methods and customise it to your liking:

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

### Using resolveRelationUsing()

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

Create a new model within your appand let it extend the Squire model that you would like to customise:

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

If you have fixture data to contibute to the library, please open a pull request!

For reference, check out the existing models.