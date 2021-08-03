<?php

namespace MrBrownNL\RandomNicknameGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MrBrownNL\RandomNicknameGenerator\Skeleton\SkeletonClass
 */
class RandomNicknameGeneratorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'random-nickname-generator';
    }
}
