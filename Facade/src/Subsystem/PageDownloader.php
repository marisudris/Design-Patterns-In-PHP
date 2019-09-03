<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade\Subsystem;

class PageDownloader
{
    public function download(string $url): string
    {
       return file_get_contents($url);
    }
