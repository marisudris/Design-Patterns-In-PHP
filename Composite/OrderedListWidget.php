<?php

namespace harlequiin\Patterns\Composite;

/**
 * Leaf implementing the Component interface
 */
class OrderedListWidget implements UIWidgetInterface
{
    public function render(): string
    {
        return "<ol><li>A</li><li>B</li><li>C</li></ol>";
    }
}
