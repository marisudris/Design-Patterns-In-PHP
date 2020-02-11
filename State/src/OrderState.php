<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

/**
 * State.
 *
 * Abstract class which defines the interface for the
 * Context (Order) object to delegate to. Also defines
 * the constructor which accepts and stores a reference 
 * to the Order context object.
 */
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
