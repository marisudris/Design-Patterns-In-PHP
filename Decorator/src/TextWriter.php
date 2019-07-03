<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Concrete Component.
 * Defines an object implementing the Component interface 
 * to which additional responsibilities can be added.
 */
class TextWriter implements TextWriterInterface
{
    public function write(): string
    {
        return "Hello, world!";
    }
}
