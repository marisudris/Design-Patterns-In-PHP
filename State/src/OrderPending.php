<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

class OrderPending extends OrderState
{
    /**
     * @var string;
     */
    protected const STATUS = "pending";

    public function prepare(): void
    {
       $this->order->setState(new OrderReady($this->order)); 
    }

    public function cancel(): void
    {
        $this->order->setState(new OrderCancelled($this->order));
    }
}
