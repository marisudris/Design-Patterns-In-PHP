<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class AntiqueFactory implements AbstractFactoryInterface
{
    public function createBook(): Book
    {
        return new PaperBook(100);
    }

    public function createPen(): Pen
    {
        return new FountainPen();
    }
}
