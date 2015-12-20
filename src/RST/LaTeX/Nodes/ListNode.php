<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\ListNode as Base;

class ListNode extends Base
{
    protected function createElement($text, $prefix)
    {
        return '\item '.$text;
    }

    protected function createList($ordered)
    {
        $keyword = $ordered ? 'enumerate': 'itemize';

        return array('\\begin{'.$keyword.'}', '\\end{'.$keyword.'}');
    }
}
