<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Conrete Decorator.
 * Adds responsibilities to the Component.
 */
class HtmlDecorator extends AbstractTextDecorator
{
    public function write(): string
    {
        return "<div>". $this->component->write() . "</div>";
    }
}
