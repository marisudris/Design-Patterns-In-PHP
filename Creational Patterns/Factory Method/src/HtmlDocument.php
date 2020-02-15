<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Concrete Product.
 *
 * Implements the Product (Document) interface by
 * extending the AbstractDocument base Product class.
 */
class HtmlDocument extends AbstractDocument
{
    public function read(): string
    {
        return "<html><head><title>" .
               $this->name . 
               "</title></head><body>" .
                $this->content .
               "</body></html>";    
    }
}
