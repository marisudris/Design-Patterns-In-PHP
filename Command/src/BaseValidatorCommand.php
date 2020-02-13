<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

abstract class BaseValidatorCommand implements ValidatorCommand
{
    /**
     * @var ArrayValidator
     */
    protected $validator;

    public function __construct(ArrayValidator $validator)
    {
        $this->validator = $validator; 
    }

    abstract public function validate(): bool;
}
