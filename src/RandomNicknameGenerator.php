<?php

namespace MrBrownNL\RandomNicknameGenerator;

class RandomNicknameGenerator
{
    private $config;

    private $adjectives;

    private $names;

    public function __construct()
    {
        $this->config = include('config/config.php');
        $this->adjectives = file('./src/dictionaries/adjectives.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->names = file('./src/dictionaries/names.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    final public function generate(): string
    {
        $nickName = ucfirst($this->adjectives[rand(0,count($this->adjectives) - 1)]) .
            $this->config->separator .
            ucfirst($this->names[rand(0,count($this->names) - 1)]) .
            ($this->config->addNumericPostfix ? rand($this->config->postfix->minimumValue, $this->config->postfix->maximumValue) : '');

        return $nickName;
    }
}
