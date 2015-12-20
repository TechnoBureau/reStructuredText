<?php

namespace reStructuredText\RST\Directives;

use reStructuredText\RST\Span;
use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

/**
 * The Replace directive will set the variables for the spans
 *
 * .. |test| replace:: The Test String!
 */
class Replace extends Directive
{
    public function getName()
    {
        return 'replace';
    }

    public function processNode(Parser $parser, $variable, $data, array $options)
    {
        return $parser->createSpan($data);
    }
}
