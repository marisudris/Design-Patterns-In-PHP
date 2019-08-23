<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

class App
{
    public function run()
    {
        $handler = new TextHandler();
        $handler->setWriter(new HtmlWriter());

        $handler->read("Some data");
    }
}
