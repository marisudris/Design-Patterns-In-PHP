<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Iterator;

use Iterator;

class MessageIterator implements Iterator
{
    /**
     * @var int position/cursor of the current iteration
     */
    private $position;

    public function __construct(MessageAggregate $messageAggregate)
    {
        $this->collection = $messageAggregate->getMessages();
    }

    public function current(): Message
    {
        return $this->collection[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }


    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }
}