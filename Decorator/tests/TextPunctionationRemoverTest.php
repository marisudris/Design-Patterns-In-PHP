<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\TextPunctuationRemover;
use harlequiin\Patterns\Decorator\TextWriter;
use PHPUnit\Framework\TestCase;

class TextPunctuationRemoverTest extends TestCase
{
    public function testTextPunctuationRemoverWritesOutTextWithoutPunctuation()
    {
        $textWriter = new TextWriter();
        $htmlWriter = new TextPunctuationRemover($textWriter);
        $expected = "Hello world";

        $this->assertEquals(
            $expected,
            $htmlWriter->write(),
            "TextPuncuationRemover should write out '{$expected}'"
        );
    }
}
