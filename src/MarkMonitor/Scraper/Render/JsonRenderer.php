<?php

namespace MarkMonitor\Scraper\Render;

class JsonRenderer implements Renderer
{
    /**
     * @param string[] $uris
     * @return string
     */
    public function render($uris)
    {
        return json_encode(array('results' => $uris), JSON_PRETTY_PRINT);
    }
}