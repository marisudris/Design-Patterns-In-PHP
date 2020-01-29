<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Creator interface.
 *
 * Declares a factory method that can be used to construct Products
 * of various subtypes.
 */
abstract class DocumentLoader
{
    /**
     * @var Document
     */
    protected $document;

    abstract public function createDocument(): Document;

    public function saveDocument(): void
    {
        // saving the document to the filesystem    
    }

    public function loadDocument(): void
    {
        // load the document to the filesystem
        // or create a new one if it doesn't exist 
    }
}
