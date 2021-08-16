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

$nickNameGenerator = RandomNicknameGenerator::getInstance(['useAdjective' => false]);

echo $nickNameGenerator->generate();

// or to generate a nickname that has been checked for uniqueness
echo $nickNameGenerator->generateUnique();
```

## Using the Laravel facade
```bash
php artisan vendor:publish --provider="MrBrownNL\RandomNicknameGenerator\RandomNicknameGeneratorServiceProvider"
````
then you can:

```php 
use MrBrownNL\RandomNicknameGenerator\Facades\NicknameGenerator;

$nickname = NicknameGenerator::generate();

// or to generate a nickname that has been checked for uniqueness
$nickname = NicknameGenerator::generateUnique);
```



### Default config parameters
```
[
    'useAdjective' => true,
    'separator' => '',
    'addNumericPostfix' => true,
    'postfix' => [
        'minimumValue' => 1,
        'maximumValue' => 999,
    ]
]
```

### Performance

The table below shows how much time it takes to generate a unique name.

While compiling custom adjective or name lists, keep in mind that performance drops drastically
if only 1% or less unique nicknames are left. 

| Available nicknames | Time    |
|:-------------------:|--------:|
| 100 %               | 0.001 s |
| 70 %                | 0.006 s |
| 40 %                | 0.014 s |
| 10 %                | 0.025 s |
| 5 %                 | 0.030 s |
| 1 %                 | 0.060 s |

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
