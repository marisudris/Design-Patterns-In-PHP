<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Strategy.
 *
 * Defines a WriterStrategy interface.
 * All concrete strategies implement this interface.
 */
interface WriterStrategy
{
    public function write(string $data): string;
}
