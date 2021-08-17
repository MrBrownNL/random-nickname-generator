<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$start = microtime(true);

$nickname = new RandomNicknameGenerator(["useAdjective" => false, "postfix" => ["maximumValue" => 999]]);

echo "Possible unique nicknames: " . $nickname->getNumberOfPossibleUniqueNicknames() . PHP_EOL;
echo "Available unique nicknames: " . $nickname->getNumberOfAvailableUniqueNicknames() . PHP_EOL;

echo "Generated unique nickname: " . $nickname->generateUnique() . PHP_EOL;

echo "Available unique nicknames: " . $nickname->getNumberOfAvailableUniqueNicknames() . PHP_EOL;

$time_elapsed_secs = microtime(true) - $start;

echo "Execution time: " . $time_elapsed_secs . " seconds." . PHP_EOL;
