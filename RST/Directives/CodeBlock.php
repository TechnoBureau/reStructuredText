<?php

namespace reStructuredText\RST\Directives;

use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

use reStructuredText\RST\Nodes\WrapperNode;
use reStructuredText\RST\Nodes\CodeNode;

/**
 * Renders a code block, example:
 *
 * .. code-block:: php
 *
 *      <?php
 *
 *      echo "Hello world!\n";
 */
class CodeBlock extends Directive
{
    public function getName()
    {
        return 'code-block';
    }

    public function process(Parser $parser, $node, $variable, $data, array $options)
    {
        if ($node) {
            $kernel = $parser->getKernel();

            if ($node instanceof CodeNode) {
                $node->setLanguage(trim($data));
            }

            if ($variable) {
                $environment = $parser->getEnvironment();
                $environment->setVariable($variable, $node);
            } else {
                $document = $parser->getDocument();
                $document->addNode($node);
            }
        }
    }

    public function wantCode()
    {
        return true;
    }
}
