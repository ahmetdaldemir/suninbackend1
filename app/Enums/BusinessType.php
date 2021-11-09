<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BusinessType extends Enum
{
    public const Rent = 'rent';
    public const Admin = 'admin';
    public const Landlord = 'landlord';
}
