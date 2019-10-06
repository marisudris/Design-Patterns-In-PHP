<?php
declare(strict_types=1);

use harlequiin\Patterns\Iterator\Message;
use harlequiin\Patterns\Iterator\MessageIterator;
use harlequiin\Patterns\Iterator\MessageAggregate;
use PHPUnit\Framework\TestCase;

class MessageIteratorTest extends TestCase
{
    public function testCurrrentReturnsAppropriateMessageObject()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $this->assertEquals(
            $this->getMessageMock(""),
            $iterator->current()
        );
    }

    public function testNextAdvancesPointer()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $iterator->next();
        $this->assertEquals(
            2,
            $iterator->key()
        );
    }
    public function testKeyReturnsCorrectKey()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $this->assertEquals(
            1,
            $iterator->key()
        );
    }

    public function testValidReturnsTrueIfInvalid()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $iterator->next();
        $iterator->next();
        $this->assertFalse($iterator->valid());
    }

    public function testValidReturnsFalseIfInvalid()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $this->assertTrue($iterator->valid());
    }

    public function testRewindResetsIterator()
    {
        $iterator = $this->getIterator();
        $iterator->next();
        $iterator->rewind();
        $this->assertEquals(
            0,
            $iterator->key()
        );
    }

    private function getIterator(): MessageIterator
    {
        return new MessageIterator($this->getAggregate());
    }

    private function getAggregate(): MessageAggregate
    {
       $aggregate = new MessageAggregate();
       $aggregate->add($this->getMessageMock("")); 
       $aggregate->add($this->getMessageMock("123")); 
       return $aggregate;
    }

    private function getMessageMock(string $messageString)
    {
        $message = $this->createMock(Message::class);
        $message->setMessage($messageString);
        return $message;
    }
}