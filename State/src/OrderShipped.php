<?php
declare(strict_types=1);

namespace harlequiin\Patterns\State;

class OrderShipped extends OrderState
{
    /**
     * @var string;
     */
    protected const STATUS = "shipped";

}
