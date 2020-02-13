<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

class NumericValidatorCommand extends BaseValidatorCommand
{
    public function validate(): bool
    {
        return $this->validator->isAllNumeric();    
    }
}
