<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Directives;

use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\Directive;

use TechnoBureau\reStructuredText\RST\Nodes\RawNode;

/**
 * Adds a stylesheet to a document, example:
 *
 * .. stylesheet:: style.css
 */
class Stylesheet extends Directive
{
    public function getName()
    {
        return 'stylesheet';
    }

    public function process(Parser $parser, $node, $variable, $data, array $options)
    {
    }
}
