<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

abstract class Creator
{
    abstract public function createProduct(): Product;

    // Some other methods
}
