<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\TextWriter;
use PHPUnit\Framework\TestCase;

class TextWriterTest extends TestCase
{
    public function testWritesOutText()
    {
        $textWriter = new TextWriter();

        $this->assertEquals(
            "Hello, world!",
            $textWriter->write(),
            "TextWriter should write out 'Hello, world!" 
        );
    }
}
