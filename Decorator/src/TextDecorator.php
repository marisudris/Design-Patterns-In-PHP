<?php

namespace harlequiin\Patterns\Decorator;

/**
 * Decorator base class.
 * Maintains a reference to a Component object
 * and defines an interface that conforms to a 
 * Component's interface
 */
class TextDecorator implements TextWriterInterface
{
    /**
     * @var TextWriterInterface
     */
    protected $component;

    public function __construct(TextWriterInterface $component)
    {
        $this->component = $component;
    }

    public function write(): string
    {
        return $this->component->write();
    }
}
