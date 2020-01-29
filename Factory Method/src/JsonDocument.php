<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Concrete Product.
 *
 * Implements the Product (Document) interface by
 * extending the AbstractDocument base Product class.
 */
class JsonDocument extends AbstractDocument
{
    public function read(): string
    {
        return json_encode($this->content);
    }
}
