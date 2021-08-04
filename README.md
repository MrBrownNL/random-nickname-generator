# PHP random nickname generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mrbrownnl/random-nickname-generator.svg?style=flat-square)](https://packagist.org/packages/mrbrownnl/random-nickname-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/mrbrownnl/random-nickname-generator.svg?style=flat-square)](https://packagist.org/packages/mrbrownnl/random-nickname-generator)

Generates random nicknames based on an adjective + name + optional number.

## Installation

You can install the package via composer:

```bash
composer require mrbrownnl/random-nickname-generator
```

## Usage

```php
<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickNameGenerator = new RandomNicknameGenerator();
echo $nickNameGenerator->generate();
```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
