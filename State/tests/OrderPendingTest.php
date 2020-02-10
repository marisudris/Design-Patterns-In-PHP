<?php
declare(strict_types=1);

use harlequiin\Patterns\State\Order;
use harlequiin\Patterns\State\OrderCancelled;
use harlequiin\Patterns\State\OrderPending;
use harlequiin\Patterns\State\OrderReady;
use PHPUnit\Framework\TestCase;

class OrderPendingTest extends TestCase
{
    public function testPrepareChangesStateToReady()
    {
        $order = $this->createMock(Order::class);
        $order->expects($this->once())
              ->method('setState')
              ->with($this->callback(function($subject){
                  return $subject instanceof OrderReady;
              }));
        $state = new OrderPending($order);
        $state->prepare();
    }

    public function testCancelChangesStateCancelled()
    {
        $order = $this->createMock(Order::class);
        $order->expects($this->once())
              ->method('setState')
              ->with($this->callback(function($subject){
                  return $subject instanceof OrderCancelled;
              }));
        $state = new OrderPending($order);
        $state->cancel();
    }
}
