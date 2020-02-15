<?php
declare(strict_types=1);

use harlequiin\Patterns\TemplateMethod\DivView;
use PHPUnit\Framework\TestCase;

class DivViewTest extends TestCase
{
    public function testOutputsDivMarkup()
    {
        $data = "Hello, world!";
        $view = new DivView(["text" => $data]);

        $view->render();

        $this->expectOutputString("<div>Hello, world!</div>");
    }
}
