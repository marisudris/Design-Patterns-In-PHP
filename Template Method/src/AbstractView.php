<?php
declare(strict_types=1);

namespace harlequiin\Patterns\TemplateMethod;

/**
 * Abstract Class.
 * Defines abstract primitive operations that Concrete 
 * subclasses define to implement steps of an algorithm
 */
abstract class AbstractView
{
    /**
     * @var array raw data array
     */
    protected $rawData = [];

    /**
     * @var array sanitized data for safe
     * embedding in the HTML
     */
    protected $sanitizedData = [];

    public function __construct(array $data)
    {
        $this->rawData = $data; 
    }

    public function render()
    {
        $this->doSanitizeDataForHtml();
        echo $this->generateHtml();
    }

    /**
     * Can be overridden using other html escaping 
     * or sanitization facilities.
     */
    protected function doSanitizeDataForHtml(){
        foreach ($this->rawData as $data) {
            $this->sanitizedData[] = htmlentities($data);
        }
    }

    /**
     * should output generated HTML
     */
    abstract protected function generateHtml(): string;
}
