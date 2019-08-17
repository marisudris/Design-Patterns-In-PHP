<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

/**
 * Service.
 * Our incompatible 3rd party service that we need to adapt.
 */
class IncompatibleMessenger
{
    public function createMessage()
    {
        return "A simple message";
    }
}
