<?php
declare(strict_types=1);

use harlequiin\Patterns\FactoryMethod\JsonApplication;
use harlequiin\Patterns\FactoryMethod\JsonDocument;
use PHPUnit\Framework\TestCase;

class JsonApplicationTest extends TestCase
{
    public function testCreateDocument()
    {
        $htmlApplication = new JsonApplication();

        $this->assertInstanceOf(
            JsonDocument::class,
            $htmlApplication->createDocument('json_document')
        );
    }
}
