<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\AnchorNode as Base;

class AnchorNode extends Base
{
    public function render()
    {
        return '\label{'.$this->value.'}';
    }
}
