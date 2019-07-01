<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class EBook extends Book
{
    public function read()
    {
       echo "Turning the E-Book on. Reading...";
    }
}

