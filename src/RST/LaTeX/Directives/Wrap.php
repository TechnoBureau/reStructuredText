<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Directives;

use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\SubDirective;
use TechnoBureau\reStructuredText\RST\Nodes\WrapperNode;

/**
 * Wraps a sub document in a div with a given class
 */
class Wrap extends SubDirective
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function getName()
    {
        return $this->class;
    }

    public function processSub(Parser $parser, $document, $variable, $data, array $options)
    {
        return $document;
    }
}
