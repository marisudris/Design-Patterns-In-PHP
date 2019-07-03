<?php
declare(strict_types=1);

use harlequiin\Patterns\Strategy\JsonWriterStrategy;
use PHPUnit\Framework\TestCase;

class JsonWriterStrategyTest extends TestCase
{
    public function testJsonWriterWrapsDataInAJsonObject()
    {
        $htmlWriter = new JsonWriterStrategy();

        $this->assertEquals(
            '{"text":"data"}',
            $htmlWriter->write("data"),
            "JsonWriterStrategy should include data in a
            JSON objets 'text' field"
        );
    }
}
