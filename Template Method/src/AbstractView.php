<?php
declare(strict_types=1);

namespace harlequiin\Patterns\TemplateMethod;

/**
 * Abstract Class.
 *
 * Defines a template method with specific steps which are
 * all methods themselves and can/must be implemented in 
 * subclasses.
 */
abstract class AbstractView
{
    /**
     * @var array raw data array
     */
    protected $rawData = [];

    public function __construct(array $data)
    {
        $this->rawData = $data; 
    }

    /**
     * Our template method.
     * We declare it "final" since it must not be overriden.
     */
    final public function render()
    {
        echo $this->generateMarkup($this->sanitizeData());
    }

    /**
     * Can be overridden to use other html escaping 
     * or sanitization facilities.
     */
    protected function sanitizeData(): array {
        $sanitizedData = [];
        foreach ($this->rawData as $data) {
            $sanitizedData[] = htmlentities($data);
        }
        return $sanitizedData;
    }

    /**
     * Should output generated HTML.
     */
    abstract protected function generateMarkup(array $data): string;
}
