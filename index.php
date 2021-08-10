<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickName = new RandomNicknameGenerator(["useAdjective" => false, "postfix" => ["maximumValue" => 9999]]);

echo $nickName->generate() . PHP_EOL;
