<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade\Subsystem;

/**
 * Subsystem class.
 *
 * Gets the text content of a webpage.
 */
class PageDownloader
{
    public function download(string $url): string
    {
       return file_get_contents($url);
    }
