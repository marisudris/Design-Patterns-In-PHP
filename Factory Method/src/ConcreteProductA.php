<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteProductA implements Product
{
    public function process()
    {
        echo "processing...";
    }
}
