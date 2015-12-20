<?php

namespace reStructuredText\RST\HTML\Nodes;

use reStructuredText\RST\Nodes\AnchorNode as Base;

class AnchorNode extends Base
{
    public function render()
    {
        return '<a id="'.$this->value.'"></a>';
    }
}
