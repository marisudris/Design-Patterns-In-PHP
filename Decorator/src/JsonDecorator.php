<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

class JsonDecorator extends AbstractTextDecorator
{
    public function write(): string
    {
        return \json_encode(["text" => $this->component->write()]);
    }
}
