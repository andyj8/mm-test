<?php

namespace MarkMonitor\Scraper\Render;

use MarkMonitor\Scraper\Asset;

class JsonRenderer implements Renderer
{
    /**
     * @param Asset[] $assets
     * @return string
     */
    public function render($assets)
    {
        $output = array_map(function(Asset $asset) {
            return array();
        }, $assets);

        return json_encode(array('results' => $output), JSON_PRETTY_PRINT);
    }
}