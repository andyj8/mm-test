<?php

namespace MarkMonitor\Scraper;

use MarkMonitor\Scraper\Parse\Parser;
use MarkMonitor\Scraper\Scrape\Scraper;

class ScrapeService
{
    /**
     * @var Scraper
     */
    private $scraper;

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @param Scraper $scraper
     * @param Parser $parser
     */
    public function __construct(Scraper $scraper, Parser $parser)
    {
        $this->parser = $parser;
        $this->scraper = $scraper;
    }

    /**
     * @param string $series
     * @return string[]
     */
    public function getAssets($series)
    {
        $html = $this->scraper->getPageContent('/serie/' . $series);
        $episodeUris = $this->parser->getEpisodeUris($html);

        return $this->getUris($episodeUris);
    }

    /**
     * @param string[] $episodeUris
     * @return string[]
     */
    private function getUris($episodeUris)
    {
        $uris = array();

        foreach ($episodeUris as $episodeUri) {
            $episodeHtml = $this->scraper->getPageContent('/episode/' . $episodeUri);
            $providerUris = $this->parser->getProviderUris($episodeHtml);

            foreach ($providerUris as $providerUri) {
                $viewHtml = $this->scraper->getPageContent($providerUri);
                $uris[] = $this->parser->getRemoteUri($viewHtml);
            }
        }

        return $uris;
    }

}
