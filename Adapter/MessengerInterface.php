<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

interface MessengerInterface
{
    public function getMessage(): string;
}
