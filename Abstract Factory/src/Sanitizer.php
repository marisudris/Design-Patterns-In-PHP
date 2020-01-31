<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Product.
 *
 * An interface for one of the Products in the product
 * family.
 */
interface Sanitizer
{
    public function sanitize(string $str): string;
}
