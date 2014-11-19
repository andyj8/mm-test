<?php

namespace MarkMonitor\Scraper\Render;

use MarkMonitor\Scraper\Asset;

interface Renderer
{
    /**
     * @param Asset[] $assets
     * @return mixed
     */
    public function render($assets);

}
