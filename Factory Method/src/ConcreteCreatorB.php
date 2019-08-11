<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteCreatorB extends Creator
{
    public function createProduct(): Product
    {
        return new ConcreteProductB();
    }
}
