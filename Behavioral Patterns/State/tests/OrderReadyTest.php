<?php
declare(strict_types=1);

use harlequiin\Patterns\State\Order;
use harlequiin\Patterns\State\OrderCancelled;
use harlequiin\Patterns\State\OrderReady;
use harlequiin\Patterns\State\OrderShipped;
use PHPUnit\Framework\TestCase;

class OrderReadyTest extends TestCase
{
    public function testSendChangesStateToReady()
    {
        $order = $this->createMock(Order::class);
        $order->expects($this->once())
              ->method('setState')
              ->with($this->callback(function($subject){
                  return $subject instanceof OrderShipped;
              }));
        $state = new OrderReady($order);
        $state->send();
    }

    public function testOrderSendSetsDate()
    {
        $order = $this->createMock(Order::class);
        $order->expects($this->once())
              ->method('setShipped')
              ->with($this->callback(function($subject){
                  return $subject instanceof DateTime;
              }));
        $state = new OrderReady($order);
        $state->send();
        
    }

    public function testCancelChangesStateCancelled()
    {
        $order = $this->createMock(Order::class);
        $order->expects($this->once())
              ->method('setState')
              ->with($this->callback(function($subject){
                  return $subject instanceof OrderCancelled;
              }));
        $state = new OrderReady($order);
        $state->cancel();
    }
}
