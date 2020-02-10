<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

class OrderCancelled extends OrderState
{
    /**
     * @var string;
     */
    protected const STATUS = "cancelled";
}

