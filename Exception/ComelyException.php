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

namespace Comely\Kernel\Exception;

use Throwable;

/**
 * Class ComelyException
 * @package Comely\Kernel\Exception
 */
class ComelyException extends \Exception
{
    /**
     * ComelyException constructor.
     * @param string $message
     * @param int|null $code
     * @param null|Throwable $previous
     */
    public function __construct(string $message = "", ?int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, intval($code), $previous);
    }
}