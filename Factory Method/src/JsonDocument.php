<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class JsonDocument extends AbstractDocument
{
    public function read(): string
    {
        return json_encode($this->content);
    }
}
