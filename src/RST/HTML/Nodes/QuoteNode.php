<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\QuoteNode as Base;

class QuoteNode extends Base
{
    public function render()
    {
        return "<blockquote>".$this->value."</blockquote>";
    }
}
