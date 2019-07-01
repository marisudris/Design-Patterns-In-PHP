<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class TouchScreenPen extends Pen
{
    public function write()
    {
        echo "Dragging the pen across the screen...";
    }
}
