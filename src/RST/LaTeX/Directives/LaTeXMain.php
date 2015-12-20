<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Directives;

use TechnoBureau\reStructuredText\RST\LaTeX\Nodes\LaTeXMainNode;
use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\Directive;

/**
 * Marks the document as LaTeX main
 */
class LaTeXMain extends Directive
{
    public function getName()
    {
        return 'latex-main';
    }

    public function processNode(Parser $parser, $variable, $data, array $options)
    {
        return new LaTeXMainNode;
    }
}
