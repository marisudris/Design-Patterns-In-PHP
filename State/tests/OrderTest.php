<?php
declare(strict_types=1);

use harlequiin\Patterns\State\Order;
use harlequiin\Patterns\State\OrderState;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testgetStatusDelegatestoOrderState()
    {
        $order = new Order();
        $state = $this->createMock(OrderState::class);
        $state->expects($this->once())
              ->method('getStatus')
              ->willReturn('pending');
        $order->setState($state);
        $order->getStatus();
    }

    public function testPrepareDelegatestoOrderState()
    {
        $order = new Order();
        $state = $this->getMockForSingleCallExpectation('prepare');
        $order->setState($state);
        $order->prepare();
    }

    public function testSendDelegatestoOrderState()
    {
        $order = new Order();
        $state = $this->getMockForSingleCallExpectation('send');
        $order->setState($state);
        $order->send();
    }

    public function testCancelDelegatestoOrderState()
    {
        $order = new Order();
        $state = $this->getMockForSingleCallExpectation('cancel');
        $order->setState($state);
        $order->cancel();
    }

    private function getMockForSingleCallExpectation(string $methodName)
    {
        $state = $this->createMock(OrderState::class);
        $state->expects($this->once())
              ->method($methodName);
        return $state;
    }
}

