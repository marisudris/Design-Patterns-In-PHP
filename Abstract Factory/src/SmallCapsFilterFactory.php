<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class SmallCapsFilterFactory implements FilterFactory
{
    public function createValidator(): Validator
    {
        return new SmallCapsValidator();
    }

    public function createSanitizer(): Sanitizer
    {
        return new SmallCapsSanitizer();
    }
}
