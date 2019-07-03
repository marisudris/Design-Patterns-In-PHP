<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Concrete Strategy.
 * Implements the algorithm using the Strategy interface.
 */
class HtmlWriterStrategy implements WriterStrategyInterface
{
    public function write(string $data): string
    {
        return "<div>{$data}</div>";
    }
}
