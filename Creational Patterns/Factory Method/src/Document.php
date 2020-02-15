<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Product interface.
 *
 * Defines the interface for objects the factory
 * method creates.
 */
interface Document
{
    public function write(string $content): void;
    public function read(): string;
}
