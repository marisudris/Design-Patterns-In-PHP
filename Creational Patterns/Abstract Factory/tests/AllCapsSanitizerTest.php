<?php
declare(strict_types=1);

use harlequiin\Patterns\AbstractFactory\SmallCapsSanitizer;
use PHPUnit\Framework\TestCase;

class SmallCapsSanitizerTest extends TestCase
{
    /**
     * @dataProvider data
     */
    public function testSanitizerAlwaysReturnsAnSmallCapsString($given, $expected)
    {
        $sanitizer = new SmallCapsSanitizer();
        $this->assertEquals(
            $expected, 
            $sanitizer->sanitize($given)
        );
    }

    public function data()
    {
        return [
            ["māris", "māris"],
            ["I'M A STRING", "i'm a string"],
            ["012345", "012345"],
            ["HeLlO wOrLd āēīōū", "hello world āēīōū"]
        ];
    }
}
