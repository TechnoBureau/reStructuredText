<?php

namespace reStructuredText\RST\Directives;

use reStructuredText\RST\Nodes\TitleNode;
use reStructuredText\RST\Span;
use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

/**
 * This sets a new target for a following title, this can be used to change
 * its link
 */
class RedirectionTitle extends Directive
{
    public function getName()
    {
        return 'redirection-title';
    }

    public function process(Parser $parser, $node, $variable, $data, array $options)
    {
        $document = $parser->getDocument();

        if ($node) {
            if ($node instanceof TitleNode) {
                $node->setTarget($data);
            }
            $document->addNode($node);
        }
    }
}
