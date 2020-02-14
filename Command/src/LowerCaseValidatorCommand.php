<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

/**
 * ConcreteCommand.
 *
 * Extends the BaseValidatorCommand superclass and implements
 * the actual request: call to the Receiver (ArrayValidator).
 */
class LowerCaseValidatorCommand extends BaseValidatorCommand
{
    public function validate(): bool
    {
        return $this->validator->isAllLowerCase();    
    }
}
