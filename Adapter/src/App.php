<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

/**
 * Client.
 * Implements our (very trivial) domain logic.
 */
class App
{
    public function readMessage(MessengerInterface $messenger): string
    {
        $message  =  $messenger->message();
        $dateTime = (new \DateTime())->format("Y-m-d H:i:s");
        $message .= "\n[Message read on {$dateTime}";

        return $message;
    }
}
