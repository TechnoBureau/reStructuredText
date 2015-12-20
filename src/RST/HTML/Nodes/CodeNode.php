<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\CodeNode as Base;

class CodeNode extends Base
{
    public function render()
    {
        return "<pre><code class=\"".$this->language."\">".htmlspecialchars($this->value)."</code></pre>";
    }
}
