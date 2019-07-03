<?php
declare(strict_types=1);

use harlequiin\Patterns\Observer\SimpleView;
use PHPUnit\Framework\TestCase;

class SimpleViewTest extends TestCase
{
    public function testEscapesAndRendersDataAsHtmlOutput()
    {
        $data = ">>>Hello, world!";

        $view = new SimpleView();
        $view->render($data);

        $this->expectOutputString("<html><body>&gt;&gt;&gt;Hello, world!</body></html>");
    }
}
