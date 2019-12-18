<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class HtmlDocumentLoader extends DocumentLoader
{
    public function getDocument(): Document
    {
       return new HtmlDocument(); 
    }
}
