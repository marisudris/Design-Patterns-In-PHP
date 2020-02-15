<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\TextWriter;
use PHPUnit\Framework\TestCase;

class TextWriterTest extends TestCase
{
    public function testWritesOutText()
    {
        $textWriter = new TextWriter();
        $expected = "Hello, world!";

        $this->assertEquals(
            $expected,
            $textWriter->write(),
            "TextWriter should write out '{$expected}'" 
        );
    }
}
