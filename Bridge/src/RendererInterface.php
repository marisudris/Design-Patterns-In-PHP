<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

interface RendererInterface
{
    public function renderHeader(string $title): string;
    public function renderList(array $content): string;
    public function renderImage(string $url): string;
    public function renderContent(array $content): string;
    public function renderFooter(array $pageInfo): string;
}
