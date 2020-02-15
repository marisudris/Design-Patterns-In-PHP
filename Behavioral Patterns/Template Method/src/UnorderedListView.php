<?php
declare(strict_types=1);

namespace harlequiin\Patterns\TemplateMethod;

/**
 * Concrete Class.
 *
 * Implements the primitive operations to carry out
 * subclass-specific steps of the algorithm.
 */
class UnorderedListView extends AbstractView
{
    protected function generateMarkup(array $data): string
    {
        $html = "<ul>";
        foreach ($data as $line) {
            $html .= "<li>{$line}</li>";
        }
        $html .= "</ul>";

        return $html;
    }
}
