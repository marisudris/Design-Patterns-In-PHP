<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Iterator;

class App
{
    public function run()
    {
        $collection = new MessageAggregate();
        $collection->add(new Message("Hello"));
        $collection->add(new Message("World!"));

        foreach ($collection as $message) {
            echo $message->getMessage() . "\n";
        }
    }
}
