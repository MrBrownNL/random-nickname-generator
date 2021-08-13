<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickName = new RandomNicknameGenerator(["useAdjective" => false, "postfix" => ["maximumValue" => 999]]);

echo $nickName->getNumberOfPossibleUniqueNicknames() . PHP_EOL;
echo $nickName->generate() . PHP_EOL;
