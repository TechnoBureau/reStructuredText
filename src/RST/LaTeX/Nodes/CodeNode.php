<?php

namespace TechnoBureau\reStructuredText\RST\LaTeX\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\CodeNode as Base;

class CodeNode extends Base
{
    public function render()
    {
        $tex = "\\lstset{language=".$this->language."}\n";
        $tex .= "\\begin{lstlisting}\n";
        $tex .= $this->value . "\n";
        $tex .= "\\end{lstlisting}\n";

        return $tex;
    }
}
