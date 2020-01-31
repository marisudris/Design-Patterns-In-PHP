<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use harlequiin\Patterns\FactoryMethod\Application;
use harlequiin\Patterns\FactoryMethod\Document;

class ApplicationTest extends TestCase
{
    public function setUp(): void
    {
        $this->document = $this->createMock(Document::class);
    }
    public function testAddDocument()
    {
        $application = $this->getMockForAbstractClass(Application::class);
        $application->expects($this->once())
                    ->method('createDocument')
                    ->willReturn($this->document);

        $application->addDocument('document_name');

        return $application;
    }

    /**
     * @depends testAddDocument
     */
    public function testGetDocument($application)
    {
        $this->assertEquals(
            $this->document,
            $application->getDocument('document_name')
        );

    }
}
