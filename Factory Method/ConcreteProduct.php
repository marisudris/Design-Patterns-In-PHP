<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class ConcreteProduct extends Product
{
    public function process()
    {
        echo "processing...";
    }
}
