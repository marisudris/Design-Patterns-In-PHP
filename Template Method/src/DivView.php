<?php
declare(strict_types=1);

namespace harlequiin\Patterns\TemplateMethod;

/**
 * Concrete Class.
 *
 * Implements the primitive operations to carry out
 * subclass-specific steps of the algorithm.
 */
class DivView extends AbstractView
{
    protected function generateMarkup(): string
    {
        $html = "";
        foreach ($this->sanitizedData as $data) {
            $html .= "<div>{$data}</div>";
        }

        return $html;
    }
}
