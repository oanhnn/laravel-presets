# Introduction

[![Build Status](https://travis-ci.org/oanhnn/laravel-presets.svg?branch=master)](https://travis-ci.org/oanhnn/laravel-presets)
[![Coverage Status](https://coveralls.io/repos/github/oanhnn/laravel-presets/badge.svg?branch=master)](https://coveralls.io/github/oanhnn/laravel-presets?branch=master)

Laravel Preset Command polyfill for Laravel 5.4

## Main features

Make [Laravel Frontend Presets](https://medium.com/@taylorotwell/laravel-frontend-presets-eca312958def) feature for Laravel 5.4

## Requirements

* php >=7.0
* Laravel 5.4.x

## Installation

To get started with Laravel Frontend Presets, use Composer to add the package to your project's dependencies:

```shell
$ composer require oanhnn/laravel-presets:dev-master
```

### Configuration

After installing the Laravel Frontend Presets library, register the `Laravel\Presets\PresetServiceProvider` in your `config/app.php` configuration file:

```php
    'providers' => [
        // Other service providers...

        Laravel\Presets\PresetServiceProvider::class,
    ],
```

## Usage

// TODO: How to use

## Changelog

See all change logs in [CHANGELOG.md][changelog]

## Contributing

All code contributions must go through a pull request and approved by
a core developer before being merged. This is to ensure proper review of all the code.

Fork the project, create a feature branch, and send a pull request.

To ensure a consistent code base, you should make sure the code follows the [PSR-2][psr2].

If you would like to help take a look at the [list of issues][issues].

License
---
This project is released under the MIT License.   
Copyright © 2017 [Oanh Nguyen](https://oanhnn.github.io/).


[changelog]: https://github.com/oanhnn/laravel-presets/blob/master/CHANGELOG.md
[psr2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[issues]: https://github.com/oanhnn/laravel-presets/issues
