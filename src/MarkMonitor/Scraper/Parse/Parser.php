<?php

namespace MarkMonitor\Scraper\Parse;

use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    /**
     * @var ParserConfig
     */
    private $config;

    /**
     * @param ParserConfig $config
     */
    public function __construct(ParserConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $html
     * @return string[]
     */
    public function getEpisodeUris($html)
    {
        $crawler = $this->getCrawler($html);

        $episodeUris = array();
        $selector = $this->config->episodesSelector;
        foreach ($crawler->filterXPath($selector) as $node) {
            $episodeUris[] = $node->getAttribute('href');
        }

        return $episodeUris;
    }

    /**
     * @param string $html
     * @return string[]
     */
    public function getProviderUris($html)
    {
        $crawler = $this->getCrawler($html);

        $providerUris = array();
        $selector = $this->config->providersSelector;

        foreach ($crawler->filterXPath($selector) as $node) {
            $providerUris[] = $node->getAttribute('href');
        }

        return $providerUris;
    }

    /**
     * @param string $html
     * @return string
     */
    public function getRemoteUri($html)
    {
        $crawler = $this->getCrawler($html);

        $selector = $this->config->remoteUriSelector;
        $button = $crawler->filterXPath($selector);

        return $button->getNode(0)->getAttribute('href');
    }

    /**
     * @param string $html
     * @return Crawler
     */
    private function getCrawler($html)
    {
        $crawler = new Crawler();
        $crawler->addContent($html);

        return $crawler;
    }

}
