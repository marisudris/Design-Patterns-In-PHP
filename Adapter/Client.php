<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

class Client
{
    public function readMessage(MessengerInterface $messenger): string
    {
        $message  =  $messenger->getMessage();
        $dateTime = (new \DateTime())->format("Y-m-d H:i:s");
        $message .= "\n[Message read on {$dateTime}";

        return $message;
    }
}
