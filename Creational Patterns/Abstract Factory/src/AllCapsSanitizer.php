<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Concrete Product.
 *
 * Implements one of the product interfaces, in this
 * case - Sanitizer.
 */
class AllCapsSanitizer implements Sanitizer
{
    public function sanitize(string $str): string
    {
        return mb_convert_case($str, MB_CASE_UPPER, "utf-8"); 
    }
}

