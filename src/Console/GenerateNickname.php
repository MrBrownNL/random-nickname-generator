<?php

namespace MrBrownNL\RandomNicknameGenerator\Console;

use Illuminate\Console\Command;
use MrBrownNL\RandomNicknameGenerator\Facades\NicknameGenerator;

class GenerateNickname extends Command
{
    protected $signature = 'generate-nickname';

    protected $description = 'Output a random nickname without checking for uniqueness';

    public function handle()
    {
        $this->info(NicknameGenerator::generate());
    }
}
