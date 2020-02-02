<?php

namespace harlequiin\Patterns\Decorator;

/**
 * Decorator base class.
 *
 * Implements the Component interface and
 * maintains a reference to a Component object.
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
