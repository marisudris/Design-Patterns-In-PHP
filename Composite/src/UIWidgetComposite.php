<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Composite;

/**
 * Composite.
 *
 * Impements the Component interface.
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

    public function render(): void
    {
        ob_start();
        echo "<div>";
        foreach ($this->uiwidgets as $widget) {
            $widget->render();
            echo "<br>";
        } 
        $result = ob_get_clean();

        $result = preg_replace("/<br>$/u", "</div>", $result);
        echo $result;
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
