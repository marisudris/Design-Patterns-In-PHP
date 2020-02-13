<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

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
