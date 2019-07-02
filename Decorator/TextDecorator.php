<?php

namespace harlequiin\Patterns\Decorator;

abstract class TextDecorator implements TextWriterInterface
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
