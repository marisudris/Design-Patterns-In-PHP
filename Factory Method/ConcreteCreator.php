<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteCreator implements CreatorInterface
{
    public function createProduct(): Product
    {
        return new ConcreteProduct();
    }
}
