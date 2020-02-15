<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\SmallCapsValidator;
use PHPUnit\Framework\TestCase;

class SmallCapsValidatorTest extends TestCase
{
    /**
     * @dataProvider data
     */
    public function testValidatorReturnsFalseOnInvalidString()
    {
        $validator = new SmallCapsValidator();
        $this->assertFalse($validator->validate("mĀRIS"));
    }

    public function data()
    {
        return [
            ["māris", true],
            ["MāRiS", false],
            ["string with w-space\t", true],
            ["string WITH w-SPACE\t", false],
            ["lv-1010", true],
            ["012345", true],
            ["ABC012345", false]
        ];
    }
}

