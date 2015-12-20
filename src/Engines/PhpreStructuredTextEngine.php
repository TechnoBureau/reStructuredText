<?php

/*
 * This file is part of Laravel Markdown.
 *
 * (c) Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TechnoBureau\reStructuredText\Engines;

use Illuminate\View\Engines\PhpEngine;
use League\CommonMark\Converter;

/**
 * This is the php markdown engine class.
 *
 * @author Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 */
class PhpreStructuredTextEngine extends PhpEngine
{
    /**
     * The markdown instance.
     *
     * @var \League\CommonMark\Converter
     */
    protected $reStructuredText;

    /**
     * Create a new instance.
     *
     * @param \League\CommonMark\Converter $markdown
     *
     * @return void
     */
    public function __construct(Converter $reStructuredText)
    {
        $this->reStructuredText = $reStructuredText;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param string $path
     * @param array  $data
     *
     * @return string
     */
    public function get($path, array $data = [])
    {
        $contents = parent::get($path, $data);

        return $this->markdown->convertToHtml($contents);
    }

    /**
     * Return the markdown instance.
     *
     * @return \League\CommonMark\Converter
     */
    public function getreStructuredText()
    {
        return $this->reStructuredText;
    }
}
