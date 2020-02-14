<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Command;

/**
 * Receiver.
 *
 * Executes the relevant business logic. Provides a couple of
 * methods which get invoked by the command objects upon a 
 * request from the Invoker.
 */
class ArrayValidator
{
    /**
     * @var array
     */
    private $array;

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function setArray(array $array): void
    {
        $this->array = $array; 
    }

    public function isAllNumeric(): bool
    {
        foreach ($this->array as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }
       return true; 
    }

    public function isAllLowerCase()
    {
        foreach ($this->array as $value) {
            if (!$this->checkCase($value, MB_CASE_LOWER)) {
                return false;
            }
        }
        return true;
    }

    public function isAllUpperCase()
    {
        foreach ($this->array as $value) {
            if (!$this->checkCase($value, MB_CASE_UPPER)) {
                return false;
            }
        }
        return true;
    }

    private function checkCase($value, $case): bool
    {
        return $value === mb_convert_case($value, $case);
    }
}
