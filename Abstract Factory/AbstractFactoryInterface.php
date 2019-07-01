<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

interface AbstractFactoryInterface
{
    public function createBook(): Book;
    public function createPen(): Pen;
}
