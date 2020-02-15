<?php
declare(strict_types=1);

use harlequiin\Patterns\Composite\OrderedListWidget;
use PHPUnit\Framework\TestCase;

class OrderedListWidgetTest extends TestCase
{
    public function testRendersOrderedList()
    {
        $listWidget = new OrderedListWidget();
        $listWidget->render();

        $this->expectOutputString("<ol><li>A</li><li>B</li><li>C</li></ol>");
    }
}
