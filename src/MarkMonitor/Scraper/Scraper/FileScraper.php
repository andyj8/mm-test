<?php

namespace MarkMonitor\Scraper\Scraper;

class FileScraper implements Scraper
{
    /**
     * @param string $location
     * @return int
     */
    public function getPageSize($location)
    {
        return filesize($location);
    }

    /**
     * @param string $location
     * @return string
     */
    public function getPageContent($location)
    {
        return file_get_contents($location);
    }

}
