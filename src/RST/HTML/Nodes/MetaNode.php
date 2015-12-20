<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\MetaNode as Base;

class MetaNode extends Base
{
    public function render()
    {
        return '<meta name="'.htmlspecialchars($this->key).'" content="'.htmlspecialchars($this->value).'" />';
    }
}
