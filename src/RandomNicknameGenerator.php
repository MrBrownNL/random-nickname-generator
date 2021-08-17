<?php

namespace MrBrownNL\RandomNicknameGenerator;

use Exception;

class RandomNicknameGenerator
{
    private $config;

    private $adjectives = [];

    private $names;

    private $numberOfPossibleUniqueNicknames;

    public function __construct(array $options = [])
    {
        $this->config = json_decode(
            json_encode(
                array_replace_recursive(
                    include(__DIR__ . '/../config/config.php'),
                    $options
                )
            )
        );

        if ($this->config->useAdjective) {
            $this->adjectives = count($this->config->dictionaries->adjectives) > 0
                ? $this->config->dictionaries->adjectives
                : file(__DIR__ . '/dictionaries/adjectives.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }

        $this->names = count($this->config->dictionaries->names) > 0
            ? $this->config->dictionaries->names
            : file(__DIR__ . '/dictionaries/names.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $this->numberOfPossibleUniqueNicknames =
            ($this->config->postfix->maximumValue - $this->config->postfix->minimumValue + 1)
            * count($this->names)
            * ($this->config->useAdjective && count($this->adjectives) > 0 ? count($this->adjectives) : 1);
    }

    /**
     * Generates a random nickname without checking for uniqueness
     *
     * @return string
     */
    public function generate(): string
    {
        $nickname = (
            $this->config->useAdjective
                ? ucfirst($this->adjectives[rand(0,count($this->adjectives) - 1)])
                : ''
            ) .
            $this->config->separator .
            ucfirst($this->names[rand(0,count($this->names) - 1)]) .
            (
                $this->config->addNumericPostfix
                    ? rand($this->config->postfix->minimumValue, $this->config->postfix->maximumValue)
                    : ''
            );

        return $nickname;
    }

    /**
     * Generates a unique random nickname which is not in the given array.
     *
     * @param array $existingNicknames
     * @return string
     * @throws Exception if all unique names are given
     */
    public function generateUnique(array $existingNicknames): string
    {
        if ($this->numberOfPossibleUniqueNicknames - count($existingNicknames) > 0) {
            do {
                $nickname = $this->generate();
            } while (in_array($nickname, $existingNicknames));

            return $nickname;
        }

        throw new Exception('All possible nicknames are given');
    }

    public function getNumberOfPossibleUniqueNicknames(): int
    {
        return $this->numberOfPossibleUniqueNicknames;
    }
}
