<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RentPeriod extends Enum
{
    public const Day = 'DAY';
    public const Week = 'WEEK';
    public const Mounth = 'MOUNTH';
 }
