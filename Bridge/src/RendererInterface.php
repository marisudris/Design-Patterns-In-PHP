<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

/**
 * Implementor.
 * Defines the interface for implementation classes, it doesn't
 * have to correspond Abstraction's interface - they can be quite
 * different.
 * Typically the Implementor interface provides only primitive 
 * operations, and Abstraction defines higher-level operations
 * based on these primitives.
 */
interface RendererInterface
{
    public function renderHeader(string $title): string;
    public function renderList(array $content): string;
    public function renderImage(string $url): string;
    public function renderContent(array $content): string;
    public function renderFooter(array $pageInfo): string;
}
