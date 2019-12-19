<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\SmallCapsValidator;
use harlequiin\Patterns\AbstractFactory\SmallCapsSanitizer;
use harlequiin\Patterns\AbstractFactory\SmallCapsFilterFactory;
use PHPUnit\Framework\TestCase;

class SmallCapsFilterFactoryTest extends TestCase
{
    public function testCreateValidatorReturnsAnInstanceOfSmallCapsValidator()
    {
        $factory = new SmallCapsFilterFactory();    
        $validator = $factory->createValidator();

        $this->assertInstanceOf(
            SmallCapsValidator::class,
            $validator
        );
    }

    public function testCreateSanitizerReturnsAnInstanceOfSmallCapsSanitizer()
    {
        $factory = new SmallCapsFilterFactory();    
        $sanitizer = $factory->createSanitizer();

        $this->assertInstanceOf(
            SmallCapsSanitizer::class,
            $sanitizer
        );
    }
}
