<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

class App
{
    public function  run()
    {
        $textWriter = new TextCapitalizer(
            new TextPunctuationRemover(
                new TextWriter()
            )
        );

        echo $textWriter->write();
    }
}
