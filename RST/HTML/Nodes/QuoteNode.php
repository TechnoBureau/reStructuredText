<?php

namespace reStructuredText\RST\HTML\Nodes;

use reStructuredText\RST\Nodes\QuoteNode as Base;

class QuoteNode extends Base
{
    public function render()
    {
        return "<blockquote>".$this->value."</blockquote>";
    }
}
