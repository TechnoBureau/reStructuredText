<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Directives;

use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\Directive;

use TechnoBureau\reStructuredText\RST\Nodes\RawNode;

/**
 * Add a meta title to the document
 *
 * .. title:: Page title
 */
class Title extends Directive
{
    public function getName()
    {
        return 'title';
    }

    public function process(Parser $parser, $node, $variable, $data, array $options)
    {
        $document = $parser->getDocument();

        $document->addHeaderNode(new RawNode('\title{'.$data.'}'));

        if ($node) {
            $document->addNode($node);
        }
    }
}