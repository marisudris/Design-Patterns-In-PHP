<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Composite;

/**
 * Component.
 *
 * Declares a common interface for all the 
 * component objects (Composites and Leaves) in the composition.
 */
interface UIWidgetInterface
{
    public function render(): void;
}
