<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

class SmallCapsValidator implements Validator
{
    public function validate(string $str): bool
    {
        return $str === mb_convert_case($str, MB_CASE_LOWER, "utf-8");             
    }
}

