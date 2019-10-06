<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Iterator;

class Message
{
    /**
     * @var string message
     */
    private $message;

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

}