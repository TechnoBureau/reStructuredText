<?php

/*
 * This file is part of Laravel Markdown.
 *
 * (c) Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TechnoBureau\reStructuredText\Compilers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\Compiler;
use Illuminate\View\Compilers\CompilerInterface;
use League\CommonMark\Converter;

/**
 * This is the markdown compiler class.
 *
 * @author Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 */
class reStructuredTextCompiler extends Compiler implements CompilerInterface
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
     * @param \League\CommonMark\Converter      $markdown
     * @param \Illuminate\Filesystem\Filesystem $files
     * @param string                            $cachePath
     *
     * @return void
     */
    public function __construct(Converter $reStructuredText, Filesystem $files, $cachePath)
    {
        parent::__construct($files, $cachePath);

        $this->reStructuredText = $reStructuredText;
    }

    /**
     * Compile the view at the given path.
     *
     * @param string $path
     *
     * @return void
     */
    public function compile($path)
    {
        $contents = $this->reStructuredText->convertToHtml($this->files->get($path));

        $this->files->put($this->getCompiledPath($path), $contents);
    }

    /**
     * Return the filesystem instance.
     *
     * @return \Illuminate\Filesystem\Filesystem
     */
    public function getFiles()
    {
        return $this->files;
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
