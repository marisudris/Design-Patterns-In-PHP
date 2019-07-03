<?php

namespace harlequiin\Patterns\Decorator;

/**
 * Decorator base class.
 * Maintains a reference to a Component object
 * and defines an interface that conforms to a 
 * Component's interface
 */
abstract class AbstractTextDecorator implements TextWriterInterface
{
    /**
     * @var TextWriterInterface
     */
    protected $component;

    public function __construct(TextWriterInterface $component)
    {
        $this->component = $component;
    }

    abstract public function write(): string;
}
