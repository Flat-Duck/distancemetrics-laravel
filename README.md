# distancemetrics-laravel

This is a basic wrapper package for the mapbox directions api https://mapbox.com API. It exposes a single class function, `dm()`, that you can use across your Laravel controllers, models, and views.

## Installation

Run `composer require flat-duck/distancemetrics-laravel` from your Laravel application root. Once that's finished, you'll need to open up your `.env` file and add the following to the bottom:

```php
DISTANCEMETRICS_API_KEY={your-api-key}
```

*Optionally:* You can publish the config file from the package by running:

```bash
php artisan vendor:publish --provider="FlatDuck\Distancemetrics\DistancemetricsServiceProvider"
```

## Usage


## More Info

This package was developed as part of a project I was working on.

If you have any questions, feel free to reach out to me [@flat-duck].