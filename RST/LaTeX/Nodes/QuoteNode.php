<?php

namespace reStructuredText\RST\LaTeX\Nodes;

use reStructuredText\RST\Nodes\QuoteNode as Base;

class QuoteNode extends Base
{
    public function render()
    {
        return "\\begin{quotation}\n".$this->value."\n\\end{quotation}\n";
    }
}
