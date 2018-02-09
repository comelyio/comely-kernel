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

namespace Comely\Kernel\Traits;

use Comely\Kernel\Exception\ComelyException;

/**
 * Trait NotCloneableTrait
 * @package Comely\Kernel\Traits
 */
trait NotCloneableTrait
{
    /**
     * @throws ComelyException
     */
    final public function __clone()
    {
        throw new ComelyException('Class "%s" cannot be cloned', get_called_class());
    }
}