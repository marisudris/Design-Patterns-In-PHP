<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

interface Sanitizer
{
    public function sanitize(string $str): string;
}
