<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Adapter;

/**
 * Adapter.
 *
 * Adapts our 3rd party messenger service.
 * Here it's used as an object adapter which composes our service.
 */
class IncompatibleMessengerAdapter implements MessengerInterface
{
    /**
     * @var IncompatibleMessenger
     */
    private $messenger;

    public function __construct(IncompatibleMessenger $messenger)
    {
       $this->messenger = $messenger;
    }

    /**
     * Uses the MessengerInterface that our domain understands and delegates to
     * the 3rd party service internally.
     */
    public function message(): string
    {
        return $this->messenger->createMessage();
    }
}
