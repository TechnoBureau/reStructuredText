<?php

namespace reStructuredText\RST\LaTeX\Nodes;

use reStructuredText\RST\Nodes\SeparatorNode as Base;

class SeparatorNode extends Base
{
    public function render()
    {
        return '\\ \\';
    }
}
