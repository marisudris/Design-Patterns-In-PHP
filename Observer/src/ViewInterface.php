<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Observer.
 *
 * Defines and interface for observer objects that can be
 * notified by the Subject to which they've subscribed.
 */
interface ViewInterface
{
    public function render(string $data): void;
}
