<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

use DateTime;

/**
 * ConcreteState.
 *
 * Extends the base State object (OrderState) and overrides
 * its methods, if necessary.
 */
class OrderReady extends OrderState
{
    /**
     * @var string
     */
    protected const STATUS = "ready";

    public function send(): void
    {
        $this->order->setShipped(new DateTime());
        $this->order->setState(new OrderShipped($this->order));
    }

    public function cancel(): void
    {
        $this->order->setState(new OrderCancelled($this->order));
    }
}
