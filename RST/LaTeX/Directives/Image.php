<?php

namespace reStructuredText\RST\LaTeX\Directives;

use reStructuredText\RST\Parser;
use reStructuredText\RST\Directive;

use reStructuredText\RST\LaTeX\Nodes\ImageNode;

/**
 * Renders an image, example :
 *
 * .. image:: image.jpg
 *      :width: 100
 *      :title: An image
 *
 */
class Image extends Directive
{
    public function getName()
    {
        return 'image';
    }

    public function processNode(Parser $parser, $variable, $data, array $options)
    {
        $environment = $parser->getEnvironment();
        $url = $environment->relativeUrl($data);

        return new ImageNode($url, $options);
    }
}
