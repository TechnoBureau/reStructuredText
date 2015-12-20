<?php

namespace reStructuredText\RST\Directives;

use reStructuredText\RST\Directive;
use reStructuredText\RST\Parser;
use reStructuredText\RST\Nodes\DummyNode;

class Dummy extends Directive
{
    public function getName()
    {
        return 'dummy';
    }

    public function processNode(Parser $parser, $variable, $data, array $options)
    {
        return new DummyNode(array('data' => $data, 'options' => $options));
    }
}
