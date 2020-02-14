<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

/**
 * Invoker.
 *
 * Stores a reference to a command object.
 * Triggers a request which gets carried out by
 * a ConcreteCommand and the Receiver, if the 
 * command refers to one. Invoker doesn't know
 * any implementation details of how the request is 
 * fulfilled, it simply calls the exection method on
 * the command.
 */
class BaseController
{
    /**
     * @var ValidatorCommand
     */
    private $command;

    public function __construct(ValidatorCommand $command)
    {
        $this->command = $command; 
    }

    public function validateInputs(): void
    {
        //...some other logic...

        $this->command->validate();
        
        //...some other logic...
    }
}
