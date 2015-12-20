<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\TitleNode as Base;

class TitleNode extends Base
{
    public function render()
    {
        $type = 'chapter';

        if ($this->level > 1) {
            $type = 'section';

            for ($i=2; $i<$this->level; $i++) {
                $type = 'sub'.$type;
            }
        }

        return '\\'.$type.'{'.$this->value.'}';
    }
}
