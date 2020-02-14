<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

/**
 * ConcreteCommand superclass.
 *
 * An abstract base class for all the ConcreteCommands to
 * inhertit from. Provides a default constructor method which
 * takes in and stores an ArrayValidator object, which acts as
 * the Receiver of the request.
 */
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
