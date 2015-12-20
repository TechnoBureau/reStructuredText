<?php

namespace reStructuredText\RST\HTML\Nodes;

use reStructuredText\RST\Nodes\TitleNode as Base;

class TitleNode extends Base
{
    public function render()
    {
        return '<a id="'.$this->token.'"></a><h'.$this->level.'>'.$this->value.'</h'.$this->level.">";
    }
}
