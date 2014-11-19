<?php

namespace MarkMonitor\Scraper\Parse;

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
     * @return Asset[]
     */
    public function getAssets($html)
    {

    }

    public function getUris($html)
    {

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
