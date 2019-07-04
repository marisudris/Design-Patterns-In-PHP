<?php
declare(strict_types=1);

namespace harlequiin\Patterns\TemplateMethod;

/**
 * Concrete Class.
 * Implements the primitive operations to carry out
 * subclass-specific steps of the algorithm
 */
class UlView extends AbstractView
{
    protected function generateHtml(): string
    {
        $html = "<ul>";
        foreach ($this->sanitizedData as $data) {
            $html .= "<li>{$data}</li>";
        }
        $html .= "</ul>";

        return $html;
    }
}
