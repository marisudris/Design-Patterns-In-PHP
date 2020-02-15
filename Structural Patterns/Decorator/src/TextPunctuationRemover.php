<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Concrete Decorator.
 *
 * Adds responsibilities to the Component.
 */
class TextPunctuationRemover extends TextDecorator
{
    public function write(): string
    {
        return preg_replace("/\pP/u", "", parent::write());
    }
}
