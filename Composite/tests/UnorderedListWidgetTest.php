<?php
declare(strict_types=1);

use harlequiin\Patterns\Composite\UnorderedListWidget;
use PHPUnit\Framework\TestCase;

class UnorderedListWidgetTest extends TestCase
{
    public function testRendersUnorderedList()
    {
        $listWidget = new UnorderedListWidget();
        $listWidget->render();

        $this->expectOutputString("<ul><li>One</li><li>Two</li><li>Three</li></ul>");
    }
}
