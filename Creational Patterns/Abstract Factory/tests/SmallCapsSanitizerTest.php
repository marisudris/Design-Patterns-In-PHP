<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\AllCapsSanitizer;
use PHPUnit\Framework\TestCase;

class AllCapsSanitizerTest extends TestCase
{
    /**
     * @dataProvider data
     */
    public function testSanitizerAlwaysReturnsAnAllCapsString($given, $expected)
    {
        $sanitizer = new AllCapsSanitizer();
        $this->assertEquals(
            $expected, 
            $sanitizer->sanitize($given)
        );
    }

    public function data()
    {
        return [
            ["MĀRIS", "MĀRIS"],
            ["i'm a string", "I'M A STRING"],
            ["012345", "012345"],
            ["HeLlO wOrLd āēīōū", "HELLO WORLD ĀĒĪŌŪ"]
        ];
    }
}
