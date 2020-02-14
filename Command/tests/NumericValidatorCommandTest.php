<?php
declare(strict_types=1);

use harlequiin\Patterns\Command\ArrayValidator;
use harlequiin\Patterns\Command\NumericValidatorCommand;
use PHPUnit\Framework\TestCase;

class NumericValidatorCommandTest extends TestCase
{
    public function testCommandCallsReceiversMethod()
    {
        $validator = $this->createMock(ArrayValidator::class);    
        $validator->expects($this->once())
                  ->method('isAllNumeric')
                  ->willReturn(false);

        $command = new NumericValidatorCommand($validator);
        $command->validate();
    }
}

