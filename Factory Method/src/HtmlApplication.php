<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Concrete Creator.
 *
 * Provides the implementation for the factory method.
 */
class HtmlApplication extends Application
{
    public function createDocument(string $name): Document
    {
       return new HtmlDocument($name); 
    }
}
