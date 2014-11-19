<?php

namespace MarkMonitor\Scraper\Parse;

class ParserConfig
{
    /**
     * @var string
     */
    private $articlesSelector;

    /**
     * @var string
     */
    private $bodySelector;

    /**
     * @return string
     */
    public function getArticlesSelector()
    {
        return $this->articlesSelector;
    }

    /**
     * @param string $articlesSelector
     */
    public function setArticlesSelector($articlesSelector)
    {
        $this->articlesSelector = $articlesSelector;
    }

    /**
     * @return string
     */
    public function getBodySelector()
    {
        return $this->bodySelector;
    }

    /**
     * @param string $bodySelector
     */
    public function setBodySelector($bodySelector)
    {
        $this->bodySelector = $bodySelector;
    }

}
