<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

class HtmlDocument extends AbstractDocument
{
    public function read(): string
    {
        return "<html><head><title>" .
               $this->name . 
               "</head><body>" .
                $this->content .
               "</body>";    
    }
}
