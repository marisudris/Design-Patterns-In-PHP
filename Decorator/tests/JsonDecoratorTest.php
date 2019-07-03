<?php
declare(strict_types=1);

use harlequiin\Patterns\Decorator\JsonDecorator;
use PHPUnit\Framework\TestCase;
use harlequiin\Patterns\Decorator\TextWriter;

class JsonDecoratorTest extends TestCase
{
    public function testJsonDecoratorWritesOutJsonText()
    {
        $textWriter = new TextWriter();
        $htmlWriter = new JsonDecorator($textWriter);

        $this->assertEquals(
            '{"text":"Hello, world!"}',
            $htmlWriter->write(),
            "JsonDecorator should write out JSON string"
        );
    }
}
