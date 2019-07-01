<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

class IncompatibleMessengerAdapter implements MessengerInterface
{
    public function __construct()
    {
       $this->messenger = new IncompatibleMessenger();
    }

    public function getMessage(): string
    {
        return $this->messenger->createMessage();
    }
}
