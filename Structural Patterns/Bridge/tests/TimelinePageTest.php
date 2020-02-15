<?php
declare(strict_types=1);

use harlequiin\Patterns\Bridge\TimelinePage;
use harlequiin\Patterns\Bridge\RendererInterface;
use PHPUnit\Framework\TestCase;

class TimelinePageTest extends TestCase
{
    public function testRendersPage()
    {
        $content = [
            "title" => "user123 timeline",
            "content" => [
                "post1", 
                "post2"
            ],
            "pageInfo" => []
        ];

        $renderer = $this->createMock(RendererInterface::class);

        $renderer->expects($this->once())
                 ->method('renderHeader')
                 ->with($content["title"])
                 ->willReturn("user123 Posts");

        $renderer->expects($this->once())
                 ->method('renderContent')
                 ->with($content["content"])
                 ->willReturn("post1\npost2");

        $page = new TimelinePage($renderer, $content);

        $this->assertEquals(
            "user123 Posts\npost1\npost2",
            $page->render(),
            "TimelinePage should assemble complete timeline page from it's
            renderers individual parts" 
        );
    }
}
