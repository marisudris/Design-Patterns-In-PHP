<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

interface FilterFactory
{
    public function createValidator(): Validator;
    public function createSanitizer(): Sanitizer;
}
