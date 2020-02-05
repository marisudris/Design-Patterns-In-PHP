<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Client.
 *
 * Configures the TextHandler (our Context object) with
 * a specific writer strategy - HtmlWriter, in this case.
 */
class App
{
    public function run()
    {
        $handler = new TextHandler();
        $handler->setWriter(new HtmlWriter());

        $handler->read("Some data");
    }
}
