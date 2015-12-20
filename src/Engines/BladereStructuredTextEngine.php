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

use Illuminate\View\Compilers\CompilerInterface;
use Illuminate\View\Engines\CompilerEngine;
use League\CommonMark\Converter;
use TechnoBureau\reStructuredText\RST\Parser;
//use TechnoBureau\reStructuredText\RST\HTML;

/**
 * This is the php markdown engine class.
 *
 * @author Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 */
class BladereStructuredTextEngine extends CompilerEngine
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
     * @param \Illuminate\View\Compilers\CompilerInterface $compiler
     * @param \League\CommonMark\Converter                 $markdown
     *
     * @return void
     */
    public function __construct(CompilerInterface $compiler, Converter $reStructuredText)
    {
        parent::__construct($compiler);

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
        $Parser = new Parser;
        return $Parser->parse($contents);
        //return $this->reStructuredText->convertToHtml($contents);
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
