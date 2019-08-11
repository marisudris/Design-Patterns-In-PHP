<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

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
