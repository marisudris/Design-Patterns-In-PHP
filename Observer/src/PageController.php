<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

/**
 * Subject & Concrete Subject.
 * Knows its observers, any number of observers may observe a subject.
 * Provides interface for attaching/[detaching] observer objects.
 * As Concrete subject - stores state of interest to Concrete Observer objects.
 * Sends a notification to its observers when its state changes.
 */
class PageController
{
    /**
     * @var string
     */
    protected $data;

    /**
     * @var SplObjectStorage
     */
    protected $views;

    public function __construct()
    {
        $this->views = new \SplObjectStorage();
    }

    public function attach(ViewInterface $view): self
    {
        $this->views->attach($view);

        return $this;
    }

    public function updateData(string $data): self
    {
        $this->data = $data;
        $this->notify();

        return $this;
    }

    protected function notify(): void
    {
        foreach($this->views as $view) {
            $view->render($this->data);
        }
    }
}
