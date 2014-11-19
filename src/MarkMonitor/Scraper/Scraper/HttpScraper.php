<?php

namespace MarkMonitor\Scraper\Scraper;

use Psr\Log\LoggerInterface;

class HttpScraper implements Scraper
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $location
     * @return int
     */
    public function getPageSize($location)
    {
        $this->logger->info('Getting size of ' . $location);

        $head = array_change_key_case(get_headers($location, true));
        $filesize = $head['content-length'];

        return $filesize;
    }

    /**
     * @param string $location
     * @return mixed
     */
    public function getPageContent($location)
    {
        $this->logger->info('Getting content of ' . $location);

        return file_get_contents($location);
    }

}


