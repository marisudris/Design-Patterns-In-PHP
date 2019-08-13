<?php

namespace harlequiin\Patterns\Composite;

/**
 * Leaf implementing the Component interface
 */
class UnorderedListWidget implements UIWidgetInterface
{
    public function render(): void
    {
        echo "<ul><li>One</li><li>Two</li><li>Three</li></ul>";
    }
}
