<?php

namespace MarkMonitor\Scraper;

use MarkMonitor\Scraper\Parse\Parser;
use MarkMonitor\Scraper\Scraper\Scraper;

class ScrapeService
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var Scraper
     */
    private $scraper;

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @param string $url
     * @param Scraper $scraper
     * @param Parser $parser
     */
    public function __construct($url, Scraper $scraper, Parser $parser)
    {
        $this->url = $url;
        $this->parser = $parser;
        $this->scraper = $scraper;
    }

    /**
     * @return Asset[]
     */
    public function collectAssets()
    {
        $html = $this->scraper->getPageContent($this->url);

        $articles = $this->parser->getArticles($html);
        foreach ($articles as $article) {
            $this->setArticleDetails($article);
        }

        return $articles;
    }

}
