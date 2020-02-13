<?php
declare(strict_types=1);

use harlequiin\Patterns\Command\ArrayValidator;
use harlequiin\Patterns\Command\LowerCaseValidatorCommand;
use PHPUnit\Framework\TestCase;

class LowerCaseValidatorCommandTest extends TestCase
{
    public function testCommandCallsReceiversMethod()
    {
        $validator = $this->createMock(ArrayValidator::class);    
        $validator->expects($this->once())
                  ->method('isAllLowerCase')
                  ->willReturn(false);

        $command = new LowerCaseValidatorCommand($validator);
        $command->validate();
    }
}

