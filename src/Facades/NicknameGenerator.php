<?php

namespace MrBrownNL\RandomNicknameGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class NicknameGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        // Must be the same name as in the register method of the service provider
        return 'nickname-generator';
    }
}
