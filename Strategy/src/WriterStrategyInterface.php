<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Strategy interface.
 * All concrete strategies implement this interface.
 */
interface WriterStrategyInterface
{
    public function write(string $data): string;
}
