<?php
declare(strict_types=1);

use harlequiin\Patterns\FactoryMethod\JsonDocument;
use PHPUnit\Framework\TestCase;

class JsonDocumentTest extends TestCase
{
    public function testRead()
    {
        $documentName = 'json_document';
        $jsonDocument = new JsonDocument($documentName);

        $content = "Hello, World!";
        $jsonDocument->write($content);

        $expected = json_encode($content);
        $this->assertEquals(
            $expected,
            $jsonDocument->read()
        );
        
    }
}
