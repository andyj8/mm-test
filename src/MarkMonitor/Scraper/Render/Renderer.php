<?php

namespace MarkMonitor\Scraper\Render;

interface Renderer
{
    /**
     * @param string[] $uris
     * @return mixed
     */
    public function render($uris);

}
