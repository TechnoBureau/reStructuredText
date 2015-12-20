<?php

namespace reStructuredText\RST\LaTeX\Nodes;

use reStructuredText\RST\Nodes\AnchorNode as Base;

class AnchorNode extends Base
{
    public function render()
    {
        return '\label{'.$this->value.'}';
    }
}
