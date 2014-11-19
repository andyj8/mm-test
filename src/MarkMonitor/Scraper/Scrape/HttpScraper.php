<?php

namespace MarkMonitor\Scraper\Scrape;

use Psr\Log\LoggerInterface;

class HttpScraper implements Scraper
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param string $baseUrl
     * @param LoggerInterface $logger
     */
    public function __construct($baseUrl, $logger)
    {
        $this->baseUrl = $baseUrl;
        $this->logger = $logger;
    }

    /**
     * @param string $series
     * @return mixed
     */
    public function getPageContent($series)
    {
        $location = $this->baseUrl . $series;

        $this->logger->info('Getting content of ' . $location);

        return file_get_contents($location);
    }

}


