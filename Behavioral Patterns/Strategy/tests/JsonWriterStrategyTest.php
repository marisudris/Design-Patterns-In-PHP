<?php
declare(strict_types=1);

use harlequiin\Patterns\Strategy\JsonWriter;
use PHPUnit\Framework\TestCase;

class JsonWriterTest extends TestCase
{
    public function testJsonWriterWrapsDataInAJsonObject()
    {
        $htmlWriter = new JsonWriter();

        $this->assertEquals(
            '{"text":"data"}',
            $htmlWriter->write("data"),
            "JsonWriter should include data in a
            JSON objets 'text' field"
        );
    }
}
