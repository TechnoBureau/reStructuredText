<?php

namespace TechnoBureau\reStructuredText\RST\Directives;

use TechnoBureau\reStructuredText\RST\Directive;
use TechnoBureau\reStructuredText\RST\Parser;
use TechnoBureau\reStructuredText\RST\Nodes\DummyNode;

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
