<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

/**
 * Abstraction.
 * Defines the Abstraction's interface.
 * Maintains to an object of type Implementator (RendererInterface).
 */
abstract class AbstractPage
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /*
     * @var array Page content
     */
    protected $content;

    public function __construct(RendererInterface $renderer, array $content)
    {
        $this->renderer = $renderer;
        $this->content = $content;
    }


    public function switchRenderer(RendererInterface $renderer): void
    {
        $this->renderer = $renderer;
    }

    abstract public function render(): string;
}
