<?php
declare(strict_types=1);

use harlequiin\Patterns\Composite\UnorderedListWidget;
use PHPUnit\Framework\TestCase;

class UnorderedListWidgetTest extends TestCase
{
    public function testRendersUnorderedList()
    {
        $listWidget = new UnorderedListWidget();

        $this->assertEquals(
            "<ul><li>One</li><li>Two</li><li>Three</li></ul>",
            $listWidget->render(),
            "UnorderedListWidget should return an unordered list of three elements"
        );
    }
}
