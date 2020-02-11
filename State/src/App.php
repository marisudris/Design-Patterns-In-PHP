<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

/**
 * Client.
 *
 * Creates and uses the Context object (Order) and
 * runs it through a couple of state transitions.
 */
class App
{
    public function run()
    {
        $order = new Order('user123');
        $order->prepare();
        $order->send();

        return $order;
    }
}
