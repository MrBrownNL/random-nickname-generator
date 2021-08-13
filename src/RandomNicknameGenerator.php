<?php

namespace MrBrownNL\RandomNicknameGenerator;

class RandomNicknameGenerator
{
    private $config;

    private $adjectives = [];

    private $names;

    private $numberOfPossibleUniqueNicknames;

    public function __construct(array $options = [])
    {
        $this->config = json_decode(json_encode(array_replace_recursive(include(__DIR__ . '/../config/config.php'), $options)));
        if ($this->config->useAdjective) {
            $this->adjectives = file(
                __DIR__ . '/dictionaries/adjectives.txt',
                FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
            );
        }
        $this->names = file(__DIR__ . '/dictionaries/names.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $this->numberOfPossibleUniqueNicknames = ($this->config->postfix->maximumValue - $this->config->postfix->minimumValue + 1) *
            count($this->names) *
            ($this->config->useAdjective && count($this->adjectives) > 0 ? count($this->adjectives) : 1);
    }

    final public function generate(): string
    {
        $nickName = ($this->config->useAdjective ? ucfirst($this->adjectives[rand(0,count($this->adjectives) - 1)]) : '') .
            $this->config->separator .
            ucfirst($this->names[rand(0,count($this->names) - 1)]) .
            ($this->config->addNumericPostfix ? rand($this->config->postfix->minimumValue, $this->config->postfix->maximumValue) : '');

        return $nickName;
    }

    final public function getNumberOfPossibleUniqueNicknames(): int
    {
        return $this->numberOfPossibleUniqueNicknames;
    }
}
