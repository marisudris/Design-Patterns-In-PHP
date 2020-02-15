<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Concrete Observer.
 *
 * Implements the Observer interface.
 * Here it's implemented using the "push" style - the Subject
 * passes only the necessary parameters when it notifies the observer.
 */
class SimpleView implements ViewInterface
{
    public function render(string $data): void
    {
        $data = htmlentities($data);
        echo "<html><body>{$data}</body></html>";
    }
}
