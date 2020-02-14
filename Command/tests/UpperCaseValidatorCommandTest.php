<?php
declare(strict_types=1);

use harlequiin\Patterns\Command\ArrayValidator;
use harlequiin\Patterns\Command\UpperCaseValidatorCommand;
use PHPUnit\Framework\TestCase;

class UpperCaseValidatorCommandTest extends TestCase
{
    public function testCommandCallsReceiversMethod()
    {
        $validator = $this->createMock(ArrayValidator::class);    
        $validator->expects($this->once())
                  ->method('isAllUpperCase')
                  ->willReturn(false);

        $command = new UpperCaseValidatorCommand($validator);
        $command->validate();
    }
}

