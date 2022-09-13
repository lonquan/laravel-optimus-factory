# laravel-optimus-factory
A can configure multiple jenssegers/optimus instances package for Laravel 

## Installation

You can install the package via composer:

```bash
composer require antcool/laravel-optimus-factory
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag=optimus-factory-config
```

Generate a new set of prime config

```bash
php artisan optimus:generate scene 31
```

## Usage

```php
OptimusFactory::encode(1) // 1985404696
OptimusFactory::decode(1985404696) // 1

OptimusFactory::make('scene')->encode(1) // 1059890159
OptimusFactory::make('scene')->decode(1059890159) // 1

```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
