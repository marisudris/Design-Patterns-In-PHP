<?php

namespace harlequiin\Patterns\Composite;

/**
 * Leaf.
 *
 * Implements the Component interface.
 */
class OrderedListWidget implements UIWidgetInterface
{
    public function render(): void
    {
        echo "<ol><li>A</li><li>B</li><li>C</li></ol>";
    }
}
