<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

class SimpleView implements ViewInterface
{
    public function render(string $data): void
    {
        $data = htmlentities($data);
        echo "<html><body>{$data}</body></html>";
    }
}
