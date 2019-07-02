<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Component interface for the objects that 
 * can have responsibilities added to them 
 * dynamically.
 */
interface TextWriterInterface
{
    /**
     * writes out the text
     */
    public function write(): string;
}
