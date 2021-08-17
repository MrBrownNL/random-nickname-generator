# PHP random nickname generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mrbrownnl/random-nickname-generator.svg?style=flat-square)](https://packagist.org/packages/mrbrownnl/random-nickname-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/mrbrownnl/random-nickname-generator.svg?style=flat-square)](https://packagist.org/packages/mrbrownnl/random-nickname-generator)

Generates random nicknames based on an adjective (optional) + name + number (optional).

## Installation

You can install the package via composer:

```bash
composer require mrbrownnl/random-nickname-generator
```

### Basic usage

```php
<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickNameGenerator = new RandomNicknameGenerator(['useAdjective' => false]);

echo $nickNameGenerator->generate();

// or generate a nickname that has been checked for uniqueness
echo $nickNameGenerator->generateUnique();
```

## Using the Laravel facade

If you are using Laravel 5.5 and up, the service provider will automatically get registered.

For older versions of Laravel (<5.5), you have to add the service provider:

####config/app.php
```php
'providers' => [
    ...
    MrBrownNL\RandomNicknameGenerator\RandomNicknameGeneratorServiceProvider::class,
]
```

To override the default config parameters in Laravel
you can publish the config file to ```config/nickname-generator.php``` and specify your own parameters.
```bash
php artisan vendor:publish --provider="MrBrownNL\RandomNicknameGenerator\RandomNicknameGeneratorServiceProvider"
````

Using the facade:

```php 
use MrBrownNL\RandomNicknameGenerator\Facades\NicknameGenerator;

$nickname = NicknameGenerator::generate();

// or generate a nickname that has been checked for uniqueness
$nickname = NicknameGenerator::generateUnique();
```
or test it:
```bash
php artisan generate-nickname
```

## Default config parameters
The default package dictionaries are used when no or empty dictionaries are specified on class instantiating.
```
[
    'useAdjective' => true,
    'separator' => '',
    'addNumericPostfix' => true,
    'postfix' => [
        'minimumValue' => 1,
        'maximumValue' => 999,
    ],
    'dictionaries' => [
        'adjectives' => [],
        'names' => [],
    ],
]
```

## Function reference

| Function | Description |
|:---|:---|
| ``` generate() ``` | Generates a random nickname which is not stored in the uniquely generated nickname list or checked for uniqueness. |
| ``` generateUnique([]) ``` | Generates a unique random nickname which is not in the given array. |
| ``` getNumberOfPossibleUniqueNicknames() ``` | Returns the total number of possible unique nicknames with the given configuration parameters. |

## Performance

The table below shows how much time it takes to generate a unique name.

While compiling custom adjective or name dictionaries, keep in mind that performance drops drastically
if only 1% or less unique nicknames are left.

The table below shows the performance when 150.000 unique nicknames are possible. 

| Available nicknames | Time    |
|:-------------------:|--------:|
| 100 %               | 0.001 s |
| 70 %                | 0.006 s |
| 40 %                | 0.014 s |
| 10 %                | 0.025 s |
| 5 %                 | 0.030 s |
| 1 %                 | 0.060 s |

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
