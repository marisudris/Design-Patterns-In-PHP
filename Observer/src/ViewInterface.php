<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

interface ViewInterface
{
    public function render(string $data): void;
}
