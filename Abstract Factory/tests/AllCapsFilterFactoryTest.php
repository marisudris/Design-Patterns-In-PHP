<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\AllCapsValidator;
use harlequiin\Patterns\AbstractFactory\AllCapsSanitizer;
use harlequiin\Patterns\AbstractFactory\AllCapsFilterFactory;
use PHPUnit\Framework\TestCase;

class AllCapsFilterFactoryTest extends TestCase
{
    public function testCreateValidatorReturnsAnInstanceOfAllCapsValidator()
    {
        $factory = new AllCapsFilterFactory();    
        $validator = $factory->createValidator();

        $this->assertInstanceOf(
            AllCapsValidator::class,
            $validator
        );
    }

    public function testCreateSanitizerReturnsAnInstanceOfAllCapsSanitizer()
    {
        $factory = new AllCapsFilterFactory();    
        $sanitizer = $factory->createSanitizer();

        $this->assertInstanceOf(
            AllCapsSanitizer::class,
            $sanitizer
        );
    }
}
