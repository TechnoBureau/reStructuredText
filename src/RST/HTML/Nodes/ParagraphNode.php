<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\ParagraphNode as Base;

class ParagraphNode extends Base
{
    public function render()
    {
        $text = $this->value;

        if (trim($text)) {
            return '<p>'.$text.'</p>';
        } else {
            return '';
        }
    }
}
