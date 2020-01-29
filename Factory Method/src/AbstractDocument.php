<?php
declare(strict_types=1);

namespace harlequiin\Patterns\FactoryMethod;

/**
 * Base Product class.
 *
 * Implements the Product (Document) interface and 
 * provides a default constructor + default implementations
 * for the Product.
 */
abstract class AbstractDocument implements Document
{
    /**
     * @var string 
     */
    protected $name;

    /**
     * @var string
     */
    protected $content;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function write(string $content): void
    {
        $this->content = $content;
    }

    public function read(): string
    {
        return $this->content;
    }
}
