<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Iterator;

class Message
{
    /**
     * @var string message
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
