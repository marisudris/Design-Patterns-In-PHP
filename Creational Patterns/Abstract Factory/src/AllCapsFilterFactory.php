<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Concrete Factory.
 *
 * Implements the Abstract Factory interface and creates
 * a specific family of products. In this case - validators,
 * sanitizers that deal with all caps sanitization and validation.
 */
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
