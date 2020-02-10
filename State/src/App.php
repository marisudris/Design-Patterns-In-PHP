<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

class App
{
    public function run()
    {
        $order = new Order();        
        $order->prepare();
        $order->send();

        return $order;
    }
}
