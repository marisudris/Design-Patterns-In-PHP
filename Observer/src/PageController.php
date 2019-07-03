<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Observer;

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

    public function setData(string $data): self
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
