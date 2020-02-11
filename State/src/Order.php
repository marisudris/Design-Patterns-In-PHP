<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

use DateTime;

class Order
{
    /**
     * @var OrderState
     */
    protected $state;

    /**
     * @var string User who made the order
     */
    protected $user;

    /**
     * @var DateTime
     */
    protected $created;

    /**
     * @var DateTime|null
     */
    protected $shipped;

    public function __construct(string $user)
    {
        $this->user = $user;
        $this->state = new OrderPending($this);
        $this->created = new DateTime();
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setShipped(DateTime $dateTime): void
    {
        $this->shipped = $dateTime;
    }

    public function setState(OrderState $state): void
    {
        $this->state = $state;
    }

    public function getStatus(): string
    {
        return $this->state->getStatus();
    }

    public function prepare(): void
    {
        $this->state->prepare(); 
    }

    public function send(): void
    {
        $this->state->send(); 
    }

    public function cancel(): void
    {
        $this->state->cancel(); 
    }
}
