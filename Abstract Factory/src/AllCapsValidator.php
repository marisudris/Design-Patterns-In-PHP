<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Concrete Product.
 *
 * Implements one of the product interfaces, in this
 * case - Validator.
 */
class AllCapsValidator implements Validator
{
    public function validate(string $str): bool
    {
        return $str === mb_convert_case($str, MB_CASE_UPPER, "utf-8");             
    }
}

