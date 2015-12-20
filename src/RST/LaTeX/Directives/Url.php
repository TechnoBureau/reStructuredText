<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Directives;

use TechnoBureau\reStructuredText\RST\Directive;
use TechnoBureau\reStructuredText\RST\Parser;

/**
 * Sets the document URL
 */
class Url extends Directive
{
    public function getName()
    {
        return 'url';
    }

    public function processAction(Parser $parser, $variabe, $data, array $options)
    {
        $environment = $parser->getEnvironment();
        $environment->setUrl(trim($data));
    }
}
