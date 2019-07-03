<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\HtmlDecorator;
use PHPUnit\Framework\TestCase;
use harlequiin\Patterns\Decorator\TextWriter;

class HtmlDecoratorTest extends TestCase
{
    public function testHtmlDecoratorWritesOutHtmlText()
    {
        $textWriter = new TextWriter();
        $htmlWriter = new HtmlDecorator($textWriter);

        $this->assertEquals(
            "<div>Hello, world!</div>",
            $htmlWriter->write(),
            "HtmlDecorator should write out html markup text"
        );
    }
}
