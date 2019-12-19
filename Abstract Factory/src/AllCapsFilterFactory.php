<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class AllCapsFilterFactory implements FilterFactory
{
    public function createValidator(): Validator
    {
        return new AllCapsValidator();
    }

    public function createSanitizer(): Sanitizer
    {
        return new AllCapsSanitizer();
    }
}
