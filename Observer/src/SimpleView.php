<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Concrete Observer
 * Implements Observer updating interface.
 * Optionally may maintain a reference to a Concrete Subject.
 * In this scenario implemented using push style - the Subject
 * passes only necessary parameters in notification
 */
class SimpleView implements ViewInterface
{
    public function render(string $data): void
    {
        $data = htmlentities($data);
        echo "<html><body>{$data}</body></html>";
    }
}
