<?php
declare(strict_types=1);

use harlequiin\Patterns\Composite\UIWidgetComposite;
use harlequiin\Patterns\Composite\UIWidgetInterface;
use harlequiin\Patterns\Composite\UnorderedListWidget;
use harlequiin\Patterns\Composite\OrderedListWidget;
use PHPUnit\Framework\TestCase;

class UIWidgetCompositeTest extends TestCase
{
    protected function setUp(): void
    {
        $this->composite = new UIWidgetComposite();
        $this->widget = $this->createMock(UIWidgetInterface::class);
    }

    public function testCanRenderChildWidgets()
    {
        $unorderedList = new UnorderedListWidget();
        $orderedList = new OrderedListWidget();

        $this->composite->add($unorderedList);
        $this->composite->add($orderedList);

        $expected  = "<ul><li>One</li><li>Two</li><li>Three</li></ul>";
        $expected .= "<br>";
        $expected .= "<ol><li>A</li><li>B</li><li>C</li></ol>"; 

        $this->assertEquals(
            $expected,
            $this->composite->render(),
            "UIWidgetComposite should render all of its child widgets separated wit <br>"
        );

    }

    public function testCanAddAWidget()
    {

        $this->composite->add($this->widget);

        $this->assertEquals(
            1,
            count($this->composite->getChildren()),
            "Number of children should be equal to the number
            of children added"
        );
         
    }

    public function testCanRemoveAWidget()
    {
        $this->composite->add($this->widget); 
        $this->composite->remove($this->widget);

        $this->assertEquals(
            0,
            count($this->composite->getChildren()),
            "Composite should have no children"
        );
    }
}
