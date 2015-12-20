<?php

namespace reStructuredText\RST\HTML\Directives;

use reStructuredText\RST\Parser;
use reStructuredText\RST\SubDirective;
use reStructuredText\RST\Nodes\WrapperNode;

/**
 * Wraps a sub document in a div with a given class
 */
class Wrap extends SubDirective
{
    protected $class;
    protected $uniqid;

    public function __construct($class, $uniqid=false)
    {
        $this->class = $class;
        $this->uniqid = $uniqid;
    }

    public function getName()
    {
        return $this->class;
    }

    public function processSub(Parser $parser, $document, $variable, $data, array $options)
    {
        $class = $this->class;
        if ($this->uniqid) {
            $id = ' id="'.uniqid($this->class).'"';
        } else {
            $id = '';
        }
        return new WrapperNode($document, '<div class="'.$class.'"'.$id.'>', '</div>');
    }
}
