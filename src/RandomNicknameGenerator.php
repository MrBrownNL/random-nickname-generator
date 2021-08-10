<?php

namespace MrBrownNL\RandomNicknameGenerator;

class RandomNicknameGenerator
{
    private $config;

    private $adjectives;

    private $names;

    public function __construct(array $options = [])
    {
        $this->config = json_decode(json_encode(array_replace_recursive(include(__DIR__ . '/../config/config.php'), $options)));
        $this->adjectives = file(__DIR__ . '/dictionaries/adjectives.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->names = file(__DIR__ . '/dictionaries/names.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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
