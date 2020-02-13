<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

class FrontController
{
    public function run(array $input)
    {
        $command = new LowerCaseValidatorCommand(
            new ArrayValidator($input)
        );

        /**
         * Different instances of invokers can reference and 
         * delegate to the same command.
         */
        $controller1 = new BaseController($command);
        $controller2 = new BaseController($command);

        $controller1->validateInputs();
        $controller2->validateInputs();
    }
}
