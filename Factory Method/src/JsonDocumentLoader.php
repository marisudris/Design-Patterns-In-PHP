<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class JsonDocumentLoader extends DocumentLoader
{
    public function createDocument(): Document
    {
       return new JsonDocument(); 
    }
}
