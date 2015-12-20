<?php

namespace reStructuredText\RST\HTML\Nodes;

use reStructuredText\RST\Nodes\ImageNode as Base;

class ImageNode extends Base
{
    public function render()
    {
        $attributes = '';
        foreach ($this->options as $key => $value) {
            $attributes .= ' '.$key . '="'.htmlspecialchars($value).'"';
        }

        return '<img src="'.$this->url.'" '.$attributes.' />';
    }
}
