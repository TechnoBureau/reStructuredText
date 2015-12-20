<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\TitleNode as Base;

class TitleNode extends Base
{
    public function render()
    {
        return '<a id="'.$this->token.'"></a><h'.$this->level.'>'.$this->value.'</h'.$this->level.">";
    }
}
