<?php

/*
 * This file is part of Laravel Markdown.
 *
 * (c) Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TechnoBureau\reStructuredText\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the markdown facade class.
 *
 * @author Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 */
class reStructuredText extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'reStructuredText';
    }
}
