<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Composite;

/**
 * Composite impementing the Component interface
 */
class UIWidgetComposite implements UIWidgetInterface
{

    /**
     * @var \SplObjectStorage
     */
    private $uiwidgets;

    public function __construct()
    {
        $this->uiwidgets = new \SplObjectStorage();
    }

    public function render(): string
    {
        $result = "";
        foreach ($this->uiwidgets as $widget) {
            $result .= "<br>" . $widget->render();
        }

        // remove the starting '<br>'
        $result = substr($result, 4);

        return $result;
    }

    public function getChildren(): array
    {
        return \iterator_to_array($this->uiwidgets);
    }

    public function add(UIWidgetInterface $widget): UIWidgetComposite
    {
        $this->uiwidgets->attach($widget);

        return $this;
    }

    public function remove(UIWidgetInterface $widget): void
    {
        if ($this->uiwidgets->contains($widget)) {
            $this->uiwidgets->detach($widget);
        }
    }
}
