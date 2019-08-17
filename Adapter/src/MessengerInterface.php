<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

/**
 * Target interface.
 * The interface our domain logic uses and understands.
 */
interface MessengerInterface
{
    public function message(): string;
}
