<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Client.
 *
 * Creates the Subject (PageController) and subscribes
 * an Observer (SimpleView) to it. Updates the Subject's
 * data and sees the how Observer gets notified - here it
 * simply echoes HTML with the updated data in it.
 */
class App
{
    public function run()
    {
        $observer = new SimpleView();
        $subject = new PageController();
        $subject->attach($observer);

        $subject->updateData("Hello, world!");
        $subject->updateData("Foo Bar Baz");
    }
}
