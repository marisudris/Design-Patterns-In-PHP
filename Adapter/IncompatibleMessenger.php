<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

class IncompatibleMessenger
{
    public function createMessage()
    {
        return "A simple message";
    }
}
