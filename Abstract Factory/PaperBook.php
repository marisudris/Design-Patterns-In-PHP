<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class PaperBook extends Book
{
    public function read()
    {
       echo "Flipping the pages. Reading...";
    }
}

