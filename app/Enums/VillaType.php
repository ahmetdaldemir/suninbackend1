<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VillaType extends Enum
{
    public const Villa = 'VILLA';
    public const Home = 'HOME';
    public const Apart = 'APART';


    public static function map() : array
    {
        return [
            static::Villa => 'VILLA',
            static::Home => 'HOME',
            static::Apart => 'APART',
        ];
    }
}
