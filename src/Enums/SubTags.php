<?php

namespace TriNguyenDuc\GiaoHangTietKiem\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Sub Tags enum.
 *
 * @method static self SEEDS()
 * @method static self YOUNG_PLANTS()
 * @method static self PLANT_WITH_ROOT_BALL()
 * @method static self PLANT_IN_A_FRAGILE_POT()
 * @method static self OTHERS()
 */
class SubTags extends Enum
{
    const SEEDS = 1;

    const YOUNG_PLANTS = 2;

    const PLANT_WITH_ROOT_BALL = 3;

    const PLANT_IN_A_FRAGILE_POT = 4;

    const OTHERS = 5;
}
