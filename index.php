<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$start = microtime(true);

$nickName = new RandomNicknameGenerator(["useAdjective" => false, "postfix" => ["maximumValue" => 999]]);

echo "Possible unique nicknames: " . $nickName->getNumberOfPossibleUniqueNicknames() . PHP_EOL;
echo "Available unique nicknames: " . $nickName->getNumberOfAvailableUniqueNicknames() . PHP_EOL;

echo "Generated unique nickname: " . $nickName->generateUnique() . PHP_EOL;

echo "Available unique nicknames: " . $nickName->getNumberOfAvailableUniqueNicknames() . PHP_EOL;

$time_elapsed_secs = microtime(true) - $start;

echo "Execution time: " . $time_elapsed_secs . " seconds." . PHP_EOL;
