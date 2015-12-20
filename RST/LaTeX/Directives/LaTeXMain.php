<?php

namespace reStructuredText\RST\LaTeX\Directives;

use reStructuredText\RST\LaTeX\Nodes\LaTeXMainNode;
use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

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
