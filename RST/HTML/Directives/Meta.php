<?php

namespace reStructuredText\RST\HTML\Directives;

use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

use reStructuredText\RST\HTML\Nodes\MetaNode;

/**
 * Add a meta information:
 *
 * .. meta::
 *      :key: value
 */
class Meta extends Directive
{
    public function getName()
    {
        return 'meta';
    }

    public function process(Parser $parser, $node, $variable, $data, array $options)
    {
        $document = $parser->getDocument();

        foreach ($options as $key => $value) {
            $meta = new MetaNode($key, $value);
            $document->addHeaderNode($meta);
        }

        if ($node) {
            $document->addNode($node);
        }
    }
}
