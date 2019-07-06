<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

class TimelinePage extends AbstractPage
{
    public function render(): string
    {
        $result = [
            $this->renderer->renderHeader($this->content["title"]),
            $this->renderer->renderContent($this->content["content"]),
            $this->renderer->renderFooter($this->content["pageInfo"])
        ];

        return rtrim(implode("\n", $result), "\n");
    }
}