<?php
declare(strict_types=1);

use harlequiin\Patterns\TemplateMethod\UlView;
use PHPUnit\Framework\TestCase;

class UlViewTest extends TestCase
{
    public function testOutputsUnorderedListMarkup()
    {
        $view = new UlView([
            "first_name" => "Māris",
            "last_name" => "Ūdris",
        ]);

        $view->render();

        $this->expectOutputString("<ul><li>Māris</li><li>Ūdris</li></ul>");
    }
}
