<?php

namespace TechnoBureau\reStructuredText\RST\Directives;

use TechnoBureau\reStructuredText\RST\Nodes\TitleNode;
use TechnoBureau\reStructuredText\RST\Span;
use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\Directive;

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
