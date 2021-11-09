<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PoolType extends Enum
{
    public const NoPool = 'NO_POOL';
    public const Private = 'PRIVATE';
    public const KidsPool = 'KIDS_POOL';
    public const DetachedPool = 'DETACHED_POOl';


    public static function map() : array
    {
        return [
            static::NoPool => 'NO_POOL',
            static::Private => 'PRIVATE',
            static::KidsPool => 'KIDS_POOL',
            static::DetachedPool => 'DETACHED_POOl'
        ];
    }
}
