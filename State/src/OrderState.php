<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

abstract class OrderState
{
    /**
     * @var string;
     */
    protected const STATUS = "";

    /**
     * @var Order
     */
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order; 
    }

    public function getStatus()
    {
        return static::STATUS;
    }

    public function prepare(): void
    {
    }

    public function send(): void
    {
    }

    public function cancel(): void
    {
    }
}
