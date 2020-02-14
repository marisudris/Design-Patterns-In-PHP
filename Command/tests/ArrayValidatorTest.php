<?php
declare(strict_types=1);

use harlequiin\Patterns\Command\ArrayValidator;
use PHPUnit\Framework\TestCase;

class ArrayValidatorTest extends TestCase
{
    public function testAllMethodsValidateIfArrayEmpty()
    {
        $array = [];
        $arrayValidator = new ArrayValidator($array);
        $this->assertTrue($arrayValidator->isAllNumeric());
        $this->assertTrue($arrayValidator->isAllLowerCase());
        $this->assertTrue($arrayValidator->isAllUpperCase());
        
    }
    public function testIsAllNumericValidatesIfAllNumeric()
    {

        $array = ['1', '2', '3', '4'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertTrue($arrayValidator->isAllNumeric());
    }

    public function testIsAllNumericDoesntValidateIfNotAllNumeric()
    {
        $array = ['1', 'lol', '', '4'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertFalse($arrayValidator->isAllNumeric());
    }

    public function testAllLowerCaseValidatesIfAllLowerCase()
    {

        $array = ['my', 'username', 'is', 'māris42'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertTrue($arrayValidator->isAllLowerCase());
    }

    public function testIsAllLowerCaseDoesntValidateIfNotAllLowerCase()
    {
        $array = ['lol', '3', 'Hello'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertFalse($arrayValidator->isAllLowerCase());
    }

    public function testAllUpperCaseValidatesIfAllUpperCase()
    {

        $array = ['MY', 'NAME', 'IS', 'MĀRIS42'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertTrue($arrayValidator->isAllUpperCase());
    }

    public function testIsAllUpperCaseDoesntValidateIfNotAllUpperCase()
    {
        $array = ['LOL', '3', 'HeLLO'];
        $arrayValidator = new ArrayValidator($array);
        $this->assertFalse($arrayValidator->isAllUpperCase());
    }
}
