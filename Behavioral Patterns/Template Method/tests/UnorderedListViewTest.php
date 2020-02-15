<?php
declare(strict_types=1);

use harlequiin\Patterns\TemplateMethod\UnorderedListView;
use PHPUnit\Framework\TestCase;

class UnorderedListViewTest extends TestCase
{
    public function testOutputsUnorderedListMarkup()
    {
        $view = new UnorderedListView([
            "first_name" => "Māris",
            "last_name" => "Ūdris",
        ]);

        $view->render();

        $this->expectOutputString("<ul><li>Māris</li><li>Ūdris</li></ul>");
    }
}
