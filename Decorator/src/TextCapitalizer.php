<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Conrete Decorator.
 *
 * Adds responsibilities to the Component.
 */
class TextCapitalizer extends TextDecorator
{
    public function write(): string
    {
        return mb_convert_case(
            parent::write(),
            MB_CASE_UPPER,
            "utf-8"
        );
    }
}
