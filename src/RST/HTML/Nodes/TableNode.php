<?php

namespace TechnoBureau\reStructuredText\RST\HTML\Nodes;

use TechnoBureau\reStructuredText\RST\Nodes\TableNode as Base;

class TableNode extends Base
{
    public function render()
    {
        $html = '<table>';
        foreach ($this->data as $k=>&$row) {
            if (!$row) {
                continue;
            }

            $html .= '<tr>';
            foreach ($row as &$col) {
                $html .= isset($this->headers[$k]) ? '<th>' : '<td>';
                $html .= $col->render();
                $html .= isset($this->headers[$k]) ? '</th>' : '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }
}
