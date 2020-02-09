<?php
declare(strict_types=1);

use harlequiin\Patterns\Iterator\Message;
use harlequiin\Patterns\Iterator\MessageAggregate;
use harlequiin\Patterns\Iterator\MessageIterator;
use PHPUnit\Framework\TestCase;

class MessageAggregateTest extends TestCase
{
    public function testAddAddsMessage()
    {
        $aggregate = new MessageAggregate();
        $aggregate->add($this->getMessageMock("abcd"));
        $this->assertEquals(
            1,
            count($aggregate->getMessages())
        );
    }

    public function testCreateIteratorReturnsMessageIterator()
    {
        $aggregate = $this->getAggregate();
        $iterator = $aggregate->getIterator();
        $this->assertInstanceOf(
            MessageIterator::class,
            $iterator
        );
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
        $message = $this->getMockBuilder(Message::class)
                        ->setConstructorArgs([$messageString])
                        ->getMock();
        return $message;
    }
}
