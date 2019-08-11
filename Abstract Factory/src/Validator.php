<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

interface Validator
{
    public function validate(string $str): bool;
}
