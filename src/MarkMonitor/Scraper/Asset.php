<?php

namespace MarkMonitor\Scraper;

class Asset
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var string[]
     */
    private $uris;

    /**
     * @param string $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return \string[]
     */
    public function getUris()
    {
        return $this->uris;
    }

    /**
     * @param string $uri
     */
    public function addUri($uri)
    {
        $this->uris[] = $uri;
    }

}
