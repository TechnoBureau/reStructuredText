<?php

namespace TechnoBureau\reStructuredText\RST\Nodes;

class RawNode extends Node
{
    public function render()
    {
        return $this->value;
    }
}
