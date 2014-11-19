<?php

namespace MarkMonitor\Scraper\Scrape;

interface Scraper
{
    /**
     * @param string $location
     * @return string
     */
    public function getPageContent($location);

}
