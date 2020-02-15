<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Client.
 *
 * Creates the final Component object by composing
 * various Decorators (TextCapitalizer, TextPunctuationRemover)
 * on top of the Concrete Component (TextWriter).
 */
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
