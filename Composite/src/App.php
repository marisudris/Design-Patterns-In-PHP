<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Composite;

class App
{
    /**
     * @var UIWidgetInterface[]
     */
    private $widgets;

    public function __construct(array $uiwidgets)
    {
        $this->widgets = $uiwidgets;
    }

    public function renderView()
    {
        $view = $this->createView(); 
        $view->render();
    }

    public function createView()
    {
        $container = new UIWidgetComposite();
        foreach ($this->uiwidgets as $widget) {
            $container->add($widget);
        }

        return $container;
    }
}
