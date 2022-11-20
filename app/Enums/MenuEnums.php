<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MenuEnums extends Enum implements LocalizedEnum
{
    const BACK_HEADER = 'back_header';
    const BACK_FOOTER = 'back_footer';
    const FRONT_HEADER = 'front_header';
    const FRONT_FOOTER = "front_footer";
}
