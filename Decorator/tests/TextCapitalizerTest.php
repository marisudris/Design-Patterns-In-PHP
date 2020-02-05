<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\TextCapitalizer;
use harlequiin\Patterns\Decorator\TextWriter;
use PHPUnit\Framework\TestCase;

class TextCapitalizerTest extends TestCase
{
    public function testTextCapitalizerWritesOutCapitalizedText()
    {
        $textWriter = new TextWriter();
        $htmlWriter = new TextCapitalizer($textWriter);
        $expected = "HELLO, WORLD!";

        $this->assertEquals(
            $expected,
            $htmlWriter->write(),
            "TextCapitalizer should write out capitalized '{$expected}'"
        );
    }
}
