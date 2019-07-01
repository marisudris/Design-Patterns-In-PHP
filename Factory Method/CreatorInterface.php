<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

interface CreatorInterface
{
    public function createProduct(): Product;
}
