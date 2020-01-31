<?php
declare(strict_types=1);

use harlequiin\Patterns\FactoryMethod\HtmlApplication;
use harlequiin\Patterns\FactoryMethod\HtmlDocument;
use PHPUnit\Framework\TestCase;

class HtmlApplicationTest extends TestCase
{
    public function testCreateDocument()
    {
        $htmlApplication = new HtmlApplication();

        $this->assertInstanceOf(
            HtmlDocument::class,
            $htmlApplication->createDocument('html_document')
        );
    }
}
