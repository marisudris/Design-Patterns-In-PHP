<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class ModernFactory implements AbstractFactoryInterface
{
    public function createBook(): Book
    {
        return new EBook(100);
    }

    public function createPen(): Pen
    {
        return new TouchScreenPen();
    }
}
