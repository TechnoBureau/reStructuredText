<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\ImageNode as Base;

class ImageNode extends Base
{
    public function render()
    {
        $attributes = array();
        foreach ($this->options as $key => $value) {
            $attributes[] = $key . '='.$value;
        }

        return '\includegraphics{'.$this->url.'}';
    }
}
