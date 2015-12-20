<?php

namespace reStructuredText\RST\HTML\Directives;

use reStructuredText\RST\Parser;
use reStructuredText\RST\SubDirective;
use reStructuredText\RST\Nodes\WrapperNode;

/**
 * Divs a sub document in a div with a given class
 */
class Div extends SubDirective
{
    public function getName()
    {
        return 'div';
    }

    public function processSub(Parser $parser, $document, $variable, $data, array $options)
    {
        return new WrapperNode($document, '<div class="'.$data.'">', '</div>');
    }
}
