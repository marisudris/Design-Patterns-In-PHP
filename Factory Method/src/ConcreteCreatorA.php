<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteCreatorA extends Creator
{
    public function createProduct(): Product
    {
        return new ConcreteProductA();
    }
}
