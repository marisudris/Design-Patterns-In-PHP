<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Decorator;

/**
 * Concrete Decorator.
 *
 * Adds responsibilities to the Component.
 */
class TextLowercaser extends TextDecorator
{
    public function write(): string
    {
        return mb_convert_case(
            parent::write(),
            MB_CASE_LOWER,
            "utf-8"
        );
    }
}
