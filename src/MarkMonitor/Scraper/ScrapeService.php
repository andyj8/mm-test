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
        $html = $this->scraper->getPageContent('serie/' . $series);
        $episodeUris = $this->parser->getEpisodeUris($html);

        return $this->getProviderUris($episodeUris);
    }

    /**
     * @param string[] $episodeUris
     * @return string[]
     */
    private function getProviderUris($episodeUris)
    {
        return array_map(function ($episodeUri) {
            $episodeHtml = $this->scraper->getPageContent('episode/' . $episodeUri);
            $providerUris = $this->parser->getProviderUris($episodeHtml);

            return $this->getRemoteUris($providerUris);
        }, $episodeUris);
    }

    /**
     * @param string[] $providerUris
     * @return string[]
     */
    private function getRemoteUris($providerUris)
    {
        return array_map(function ($providerUri) {
            $viewHtml = $this->scraper->getPageContent($providerUri);

            return $this->parser->getRemoteUri($viewHtml);
        }, $providerUris);
    }

}
