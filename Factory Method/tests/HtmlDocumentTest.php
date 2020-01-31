<?php
declare(strict_types=1);

use harlequiin\Patterns\FactoryMethod\HtmlDocument;
use PHPUnit\Framework\TestCase;

class HtmlDocumentTest extends TestCase
{
    public function testRead()
    {
        $documentName = 'html_document';
        $htmlDocument = new HtmlDocument($documentName);

        $content = 'Hello, World!';
        $htmlDocument->write($content);

        $expected = '<html><head><title>' .
                    $documentName .
                    '</title></head><body>' . 
                    $content .
                    '</body></html>';
        $this->assertEquals(
            $expected,
            $htmlDocument->read()
        );
        
    }
}
