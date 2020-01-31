<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Abstract Factory.
 *
 * Defines an interface for Concrete Factories
 * Defines methods for Product creation and, therefore,
 * determines what kinds of Products make up the product family.
 */
interface FilterFactory
{
    public function createValidator(): Validator;
    public function createSanitizer(): Sanitizer;
}
