<?php
declare(strict_types=1);

use harlequiin\Patterns\Strategy\HtmlWriter;
use PHPUnit\Framework\TestCase;

class HtmlWriterTest extends TestCase
{
    public function testHtmlWriterWrapsDataInHtmlDivTags()
    {
        $htmlWriter = new HtmlWriter();

        $this->assertEquals(
            "<div>data</div>",
            $htmlWriter->write("data"),
            "HtmlWriter should wrap 'data' in div tags"
        );
    }
}
