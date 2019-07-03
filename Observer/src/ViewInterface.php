<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Observer.
 * Defines and updating interface for objects that should be
 * notified of shanges in a Subject
 */
interface ViewInterface
{
    public function render(string $data): void;
}
