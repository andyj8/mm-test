<?php

namespace MarkMonitor\ScraperBundle\Command;

use MarkMonitor\Scraper\Render\Renderer;
use MarkMonitor\Scraper\ScrapeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScrapeCommand extends Command
{
    const ARG = 'series';
    const NAME = 'markmonitor:scrape';

    /**
     * @var ScrapeService
     */
    private $scraperService;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @param ScrapeService $service
     * @param Renderer $renderer
     */
    public function __construct(ScrapeService $service, Renderer $renderer)
    {
        $this->scraperService = $service;
        $this->renderer = $renderer;

        parent::__construct(self::NAME);
    }

    protected function configure()
    {
        $this->addArgument(self::ARG, InputArgument::REQUIRED, 'Which series?');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $uris = $this->scraperService->getAssets($input->getArgument(self::ARG));
        $json = $this->renderer->render($uris);

        echo $json;
    }

} 