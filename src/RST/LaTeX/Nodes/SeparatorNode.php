<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\SeparatorNode as Base;

class SeparatorNode extends Base
{
    public function render()
    {
        return '\\ \\';
    }
}
