<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

class JsonDecorator extends TextDecorator
{
    public function write(): string
    {
        return \json_encode(["text" => $this->component->write()]);
    }
}
