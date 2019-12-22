<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Facade\Subsystem;

/**
 * Subsystem class.
 *
 * Represents a parsed HTML tree.
 */
class HtmlTree
{
    /**
     * @var string text content (if any) of node
     */
    protected $text;

    /**
     * @var string type(tag) of the HTML node
     */
    protected $type;

    /**
     * @var array children of the HTML node
     */
    protected $children;

    public function __construct()
    {
        $this->children = [];        
    }

    public function addChild(HtmlTree $child): self
    {
        $this->children[] = $child;
        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getText(): string 
    {
        return $this->getText;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
