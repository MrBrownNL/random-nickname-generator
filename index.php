<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$start = microtime(true);

$nickName = new RandomNicknameGenerator(["useAdjective" => false, "postfix" => ["maximumValue" => 999]]);

//echo $nickName->getNumberOfPossibleUniqueNicknames() . PHP_EOL;

echo $nickName->generateUnique() . PHP_EOL;

$time_elapsed_secs = microtime(true) - $start;

echo "Time elapsed: " . $time_elapsed_secs . " seconds." . PHP_EOL;
