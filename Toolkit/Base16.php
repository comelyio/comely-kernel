<?php
/**
 * This file is part of Comely package.
 * https://github.com/comelyio/comely
 *
 * Copyright (c) 2016-2019 Furqan A. Siddiqui <hello@furqansiddiqui.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code or visit following link:
 * https://github.com/comelyio/comely/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Comely\Kernel\Toolkit;

use Comely\Kernel\Exception\Base16Exception;

/**
 * Class Base16
 * @package Comely\Kernel\Toolkit
 */
class Base16
{
    /**
     * @param $value
     * @param int|null $bits
     * @return bool
     * @throws Base16Exception
     */
    public static function isValid($value, ?int $bits = null): bool
    {
        if (!is_string($value)) {
            return false;
        }

        if ($bits && $bits % 8 !== 0) {
            throw new Base16Exception('Argument for param. "bits" must be in multiples of 8');
        }

        $length = $bits ? '{' . $bits / 4 . '}' : '{2,}';
        $preg = '/^[a-f0-9]' . $length . '$/i';
        return preg_match($preg, $value) ? true : false;
    }

    /**
     * @param string $str
     * @return string
     */
    public static function Str2Hex(string $str): string
    {
        $hex = "";
        for ($i = 0; $i < strlen($str); $i++) {
            $hex .= dechex(ord($str[$i]));
        }

        return $hex;
    }

    /**
     * @param string $hex
     * @return string
     */
    public static function Hex2Str(string $hex): string
    {

        $str = "";
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $str .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }

        return $str;
    }

    /**
     * @param string $hex
     * @param int|null $chunkSize
     * @return string
     */
    public static function Hex2Bits(string $hex, int $chunkSize = 4): string
    {
        $bits = "";
        for ($i = 0; $i < strlen($hex); $i++) {
            $bits .= str_pad(base_convert($hex[$i], 16, 2), $chunkSize, '0', STR_PAD_LEFT);
        }
        return $bits;
    }

    /**
     * @param string $bits
     * @param int $chunkSize
     * @return string
     */
    public static function Bits2Hex(string $bits, int $chunkSize = 4): string
    {
        $hex = "";
        foreach (str_split($bits, $chunkSize) as $chunk) {
            $hex .= base_convert($chunk, 2, 16);
        }

        return $hex;
    }
}