<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade;

use harlequiin\Patterns\Facade\Subsystem\PageDownloader;
use harlequiin\Patterns\Facade\Subsystem\HtmlParser;
use harlequiin\Patterns\Facade\Subsystem\JsonEncoder;

/**
 * Facade.
 * Knows which subsystem classes are responsible
 * for a request, delegates requests to appropriate
 * susbsystem classes.
 */
class HtmlToJsonConverter
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
        $this->PageDownloader = new PageDownloader();
        $this->parser = new HtmlParser(); 
    }

    public function convert(string $page): string
    {
        if (filter_var($page, FILTER_VALIDATE_URL)) {
            $page = $this->downloader->download($page);
        } 
        $parsedTree = $this->htmlParser->parse($page);
        $json = $this->JsonEncoder->encodeHtmlTree($parsedTree);

        return $json;
    }
}
