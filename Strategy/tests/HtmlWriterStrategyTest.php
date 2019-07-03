<?php
declare(strict_types=1);

use harlequiin\Patterns\Strategy\HtmlWriterStrategy;
use PHPUnit\Framework\TestCase;

class HtmlWriterStrategyTest extends TestCase
{
    public function testHtmlWriterWrapsDataInHtmlDivTags()
    {
        $htmlWriter = new HtmlWriterStrategy();

        $this->assertEquals(
            "<div>data</div>",
            $htmlWriter->write("data"),
            "HtmlWriterStrategy should wrap 'data' in div tags"
        );
    }
}
