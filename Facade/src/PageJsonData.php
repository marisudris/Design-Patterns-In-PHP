<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade;

use harlequiin\Patterns\Facade\Subsystem\PageDownloader;
use harlequiin\Patterns\Facade\Subsystem\HtmlParser;
use harlequiin\Patterns\Facade\Subsystem\JsonEncoder;

/**
 * Facade.
 *
 * Knows which subsystem classes are responsible
 * for handling client request, delegates requests to appropriate
 * subsystem classes.
 */
class PageJsonData
{
    /**
     * @var PageDownloader
     */
    protected $downloader;

    /**
     * @var HtmlParser
     */
    protected $parser;

    /**
     * @var JsonEncoder
     */
    protected $jsonEncoder;

    public function __construct()
    {
        $this->downloader = new PageDownloader();
        $this->parser = new HtmlParser(); 
        $this->jsonEncoder = new JsonEncoder();
    }

    /**
     * @throws Exception
     */
    public function get(string $page): string
    {
        if (!filter_var($page, FILTER_VALIDATE_URL)) {
            throw new \Exception("Invalid URL");
        } 
        $page = $this->downloader->download($page);
        $parsedTree = $this->htmlParser->parse($page);
        $json = $this->JsonEncoder->encodeHtmlTree($parsedTree);

        return $json;
    }
}
