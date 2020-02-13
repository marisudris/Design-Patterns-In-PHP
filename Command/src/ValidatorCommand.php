<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

interface ValidatorCommand
{
    public function validate(): bool;
}
