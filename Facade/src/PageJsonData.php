<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade;

use harlequiin\Patterns\Facade\Subsystem\PageDownloader;
use harlequiin\Patterns\Facade\Subsystem\HtmlParser;
use harlequiin\Patterns\Facade\Subsystem\JsonEncoder;

/**
 * Facade.
 *
 * Provides a simplified interface for the subsystem.
 * Knows which subsystem classes are responsible
 * for handling a client request, delegates requests
 * to the appropriate subsystem classes.
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

    public function __construct(
        PageDownloader $downloader = null,
        HtmlParser $parser = null,
        JsonEncoder $jsonEncoder = null
    ) {
        $this->downloader = $downloader ?? new PageDownloader();
        $this->parser = $parser ?? new HtmlParser(); 
        $this->jsonEncoder = $jsonEncoder ?? new JsonEncoder();
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
