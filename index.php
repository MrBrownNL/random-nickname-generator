<?php

use MrBrownNL\RandomNicknameGenerator\RandomNicknameGenerator;

require 'vendor/autoload.php';

$nickName = new RandomNicknameGenerator();
echo $nickName->generate();
