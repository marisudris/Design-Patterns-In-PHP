<?php
declare(strict_types=1);

use harlequiin\Patterns\TemplateMethod\AbstractView;
use PHPUnit\Framework\TestCase;

class AbstractViewTest extends TestCase
{
    public function testAbstractViewSanitizesAndRendersOutput()
    {
        $data = ["text" => "<script type='javascript'></script>"];
		$sanitized = "&lt;script type='javascript'&gt;&lt;/script&gt;";
        $output = "<div>{$sanitized}</div";

        $view = $this->getMockForAbstractClass(AbstractView::class, [$data]);

        $view->expects($this->once())
             ->method('generateMarkup')
             ->willReturn($output);

        $view->render();

        $this->expectOutputString($output);
    }
}
