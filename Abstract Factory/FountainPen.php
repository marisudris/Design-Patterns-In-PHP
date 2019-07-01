<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class FountainPen extends Pen
{
    private $inkLevel;

    public function write()
    {
        $this->inkLevel--;
        if ($this->inkLevel >= 0) {
            throw new OutOfInkException();
        }

        echo "Writing and smudging ink all over...";
    }
}
