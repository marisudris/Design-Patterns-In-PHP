<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

/**
 * Command.
 *
 * Defines the interface for all ConcreteCommands.
 * 'validate()' acts as the exection method (equivalent
 * to 'execute()' in the canonical example).
 */
interface ValidatorCommand
{
    public function validate(): bool;
}
