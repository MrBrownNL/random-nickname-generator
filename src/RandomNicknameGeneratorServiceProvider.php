<?php

namespace MrBrownNL\RandomNicknameGenerator;

use Illuminate\Support\ServiceProvider;
use MrBrownNL\RandomNicknameGenerator\Console\GenerateNickname;
use MrBrownNL\RandomNicknameGenerator\Facades\NicknameGenerator;

class RandomNicknameGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    GenerateNickname::class,
                ]
            );
        }

        $this->publishes(
            [
                __DIR__.'/../config/config.php' => base_path('config/nickname-generator.php'),
            ],
            'config'
        );
    }

    public function register()
    {
        // Binds the name given in the facade
        $this->app->bind('nickname-generator', function () {
            return RandomNicknameGenerator::getInstance();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'nickname-generator');
    }
}
