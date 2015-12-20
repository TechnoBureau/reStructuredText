<?php

include('../../autoload.php');

use reStructuredText\RST\Parser;
use reStructuredText\RST\LaTeX\Kernel;

$parser = new Parser(null, new Kernel);
$document = $parser->parse(file_get_contents('document.rst'));

echo $document->renderDocument();
