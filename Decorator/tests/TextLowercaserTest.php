<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\TextLowercaser;
use harlequiin\Patterns\Decorator\TextWriter;
use PHPUnit\Framework\TestCase;

class TextLowercaserTest extends TestCase
{
    public function testTextLowercaserWritesOutLowercasedText()
    {
        $textWriter = new TextWriter();
        $htmlWriter = new TextLowercaser($textWriter);
        $expected = "hello, world!";

        $this->assertEquals(
            $expected,
            $htmlWriter->write(),
            "TextLowercaser should write out lowercased '{$expected}'"
        );
    }
}
