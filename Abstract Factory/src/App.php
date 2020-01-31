<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

/**
 * Client.
 *
 * Makes use of the Abstract Factory and the Products
 * it creates. Refers to the factories and products only
 * through their abstract interfaces.
 */
class App
{
    /**
     * @var FilterFactory
     */
    private $factory;

    public function __construct(FilterFactory $factory)
    {
        $this->factory = $factory;
    }

    public function run()
    {
        $validator = $this->factory->createValidator();
        $sanitizer = $this->factory->createSanitizer();

        $input = "harlequiin";
        if (!$validator->validate($input)) {
            $input = $sanitizer->sanitize($input);
        }

        echo "Input: {$input}";
    }
}
