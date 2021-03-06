<?php

namespace TechnoBureau\reStructuredText\RST\Nodes;

abstract class SeparatorNode extends Node
{
    protected $level;

    public function __construct($level)
    {
        $this->level = $level;
    }
}
