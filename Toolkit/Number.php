<?php
/**
 * This file is part of Comely package.
 * https://github.com/comelyio/comely
 *
 * Copyright (c) 2016-2018 Furqan A. Siddiqui <hello@furqansiddiqui.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/comelyio/comely/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Comely\Kernel\Toolkit;

/**
 * Class Number
 * @package Comely\Kernel\Toolkit
 */
class Number
{
    /**
     * Check if specified number is with in specified range
     *
     * @param int $num
     * @param int $from
     * @param int $to
     * @return bool
     */
    public static function Range(int $num, int $from, int $to): bool
    {
        return ($num >= $from && $num <= $to) ? true : false;
    }

    /**
     * Check if specified number is with in specified range (using BCMath)
     *
     * @param string $num
     * @param string $from
     * @param string $to
     * @param int $scale
     * @return bool
     */
    public static function BcRange(string $num, string $from, string $to, int $scale = 0): bool
    {
        if (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $num)) {
            return false;
        }

        if (bccomp($num, $from, $scale) !== -1) {
            if (bccomp($num, $to, $scale) !== 1) {
                return true;
            }
        }

        return false;
    }
}