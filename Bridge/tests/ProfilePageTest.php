<?php
declare(strict_types=1);

use harlequiin\Patterns\Bridge\ProfilePage;
use harlequiin\Patterns\Bridge\RendererInterface;
use PHPUnit\Framework\TestCase;

class ProfilePageTest extends TestCase
{
    public function testRendersPage()
    {
        $title = "harlequiin";
        $content = [
            "title" => "harlequiin",
            "content" => [
                "location" => "Latvia",
                "image" => "some url"
            ],
            "pageInfo" => [
                "author" => "Māris Ūdris"
            ]
        ];

        $renderer = $this->createMock(RendererInterface::class);

        $renderer->expects($this->once())
                 ->method("renderHeader")
                 ->with($content["title"])
                 ->willReturn('Title: harlequiin');

        $renderer->expects($this->once())
                 ->method("renderList")
                 ->with($content["content"])
                 ->willReturn("Location: location, Image: some url");

        $renderer->expects($this->once())
                 ->method('renderFooter')
                 ->with($content["pageInfo"])
                 ->willReturn("Author: Māris Ūdris");

        $page = new ProfilePage($renderer, $content);

        $this->assertEquals(
            "Title: harlequiin\nLocation: location, Image: some url\nAuthor: Māris Ūdris",
            $page->render(),
            "ProfilePage should assemble complete profile page from it's
            renderers individual parts" 
        );
    }
}
