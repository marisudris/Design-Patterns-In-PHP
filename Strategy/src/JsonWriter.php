<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Concrete Strategy.
 *
 * Implements the algorithm using the WriterStrategy interface.
 */
class JsonWriter implements WriterStrategy
{
    public function write(string $data): string
    {
        return \json_encode(["text" => $data]);
    }
}
