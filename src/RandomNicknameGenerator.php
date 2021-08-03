<?php

namespace MrBrownNL\RandomNicknameGenerator;

class RandomNicknameGenerator
{
    public function generate()
    {
        $adjectives = file('./src/dictionaries/adjectives.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $names = file('./src/dictionaries/names.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $config = include('config/config.php');

        $nickName = ucfirst($adjectives[rand(0,count($adjectives) - 1)]) .
            $config->separator .
            ucfirst($names[rand(0,count($names) - 1)]) .
            ($config->addNumericPostfix ? rand($config->postfix->minimumValue, $config->postfix->maximumValue) : '');

        return $nickName;
    }
}
