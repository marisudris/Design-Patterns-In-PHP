<?php
declare(strict_types=1);

use harlequiin\Patterns\Command\BaseController;
use harlequiin\Patterns\Command\ValidatorCommand;
use PHPUnit\Framework\TestCase;

class BaseControllerTest extends TestCase
{
    public function testExecuteCommandDelegatesToCommand()
    {
        $command = $this->createMock(ValidatorCommand::class);
        $command->expects($this->once())
                ->method('validate');
        $controller = new BaseController($command);
        $controller->validateInputs();
    }
}

