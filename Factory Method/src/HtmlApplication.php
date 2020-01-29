<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class HtmlDocumentLoader extends DocumentLoader
{
    public function createDocument(string $name): Document
    {
       return new HtmlDocument($name); 
    }
}
