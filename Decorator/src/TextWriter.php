<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

class TextWriter implements TextWriterInterface
{
    public function write(): string
    {
        return "Hello, world!";
    }
}
