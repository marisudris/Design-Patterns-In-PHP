<?php
declare(strict_types=1);

use harlequiin\Patterns\Adapter\IncompatibleMessengerAdapter;
use harlequiin\Patterns\Adapter\IncompatibleMessenger;
use PHPUnit\Framework\TestCase;

class IncompatibleMessengerAdapterTest extends TestCase
{
    public function testGetMessageCallsAdaptee()
    {
        $expectedMessage = 'Hello, world!';

        $incompatibleMessenger = $this->createMock(IncompatibleMessenger::class);
        $incompatibleMessenger->expects($this->once())
                              ->method('createMessage')
                              ->willReturn($expectedMessage);
        $adapter = new IncompatibleMessengerAdapter($incompatibleMessenger);

        $this->assertEquals(
            $expectedMessage,
            $adapter->getMessage()
        );
    }
}
