<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

class HtmlDecorator extends AbstractTextDecorator
{
    public function write(): string
    {
        return "<div>". $this->component->write() . "</div>";
    }
}
