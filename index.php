<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickName = new RandomNicknameGenerator(["separator" => "-", "postfix" => ["maximumValue" => 99]]);

echo $nickName->generate() . PHP_EOL;
