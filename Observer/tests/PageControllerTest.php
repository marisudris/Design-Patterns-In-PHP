<?php
declare(strict_types=1);

use harlequiin\Patterns\Observer\PageController;
use harlequiin\Patterns\Observer\ViewInterface;
use PHPUnit\Framework\TestCase;

class PageControllerTest extends TestCase
{
    public function testPageContollerNotifiesItsViewsOnUpdate()
    {
        $data = "some data";

        $view1 = $this->createMock(ViewInterface::class);
        $view1->expects($this->once())
              ->method("render")
              ->with($data);

        $view2 = $this->createMock(ViewInterface::class);
        $view2->expects($this->once())
              ->method("render")
              ->with($data);

        $controller = new PageController();

        $controller->attach($view1);
        $controller->attach($view2);
        $controller->setData($data);
    }
}
