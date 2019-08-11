<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteProductB implements Product
{
    public function process()
    {
        echo "processing...";
    }
}
