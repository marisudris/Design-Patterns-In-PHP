<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Creator interface.
 *
 * Declares a factory method that can be used to construct Products
 * of various subtypes.
 */
abstract class Application
{
    /**
     * @var Document[]
     */
    protected $documents;

    abstract public function createDocument(string $name): Document;

    public function addDocument(string $name): void
    {
        $this->documents[$name] = $this->createDocument($name);
    }

    /**
     * @throws NoDocumentException
     */
    public function getDocument(string $name): Document
    {
        if (!array_key_exists($name, $this->documents)) {
            throw new NoDocumentException("Document not found");
        }
        return $this->documents[$name];
    }
}
