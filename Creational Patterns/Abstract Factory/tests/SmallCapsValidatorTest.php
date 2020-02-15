<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\AllCapsValidator;
use PHPUnit\Framework\TestCase;

class AllCapsValidatorTest extends TestCase
{
    /**
     * @dataProvider data
     */
    public function testValidatorReturnsFalseOnInvalidString()
    {
        $validator = new AllCapsValidator();
        $this->assertFalse($validator->validate("mĀRIS"));
    }

    public function data()
    {
        return [
            ["MĀRIS", true],
            ["MāRiS", false],
            ["STRING WITH W-SPACE\t", true],
            ["string WITH w-SPACE\t", false],
            ["LV-1010", true],
            ["012345", true],
            ["abc012345", false]
        ];
    }
}

