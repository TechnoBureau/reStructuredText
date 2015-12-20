<?php

namespace reStructuredText\RST\HTML\Nodes;

use reStructuredText\RST\Nodes\MetaNode as Base;

class MetaNode extends Base
{
    public function render()
    {
        return '<meta name="'.htmlspecialchars($this->key).'" content="'.htmlspecialchars($this->value).'" />';
    }
}
