<?php

namespace MarkMonitor\Scraper\Scraper;

interface Scraper
{
    /**
     * @param string $location
     * @return int
     */
    public function getPageSize($location);

    /**
     * @param string $location
     * @return string
     */
    public function getPageContent($location);

}
