<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Iterator;

use Iterator;
use IteratorAggregate;

class MessageAggregate implements IteratorAggregate
{
    /**
     * @var Message[] messages collection
     */
    private $messages;


    public function add(Message $message): void
    {
        $this->messages[] = $message;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getIterator(): Iterator
    {
        return new MessageIterator($this);   
    }
}