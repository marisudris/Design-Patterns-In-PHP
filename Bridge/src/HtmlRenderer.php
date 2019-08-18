<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

/**
 * Concrete Implementor.
 * Implements the Implementor interface and defines
 * it's concrete implementation.
 *
 * (Very) basic HTML markup renderer.
 */
class HtmlRenderer implements RendererInterface
{
    public function renderHeader(string $title): string
    {
        return "<head><meta charset=\"utf-8\">{$this->renderTitle($title)}</head>";
    }

    public function renderTitle(string $title): string
    {
        return "<title>{$title}</title>";
    }

    public function renderImage(string $url): string
    {
        return "<img src=\"{$url}\" alt=\"\">";
    }

    public function renderList(array $content): string
    {
        $html  = "<ul>";
        $html .= $this->encloseArrayElementsInTags($content, "li");
        $html .= "</ul>";
        return $html;
    }

    public function renderContent(array $content): string
    {
        $html  = "<div class=\"content\">";
        $html .= $this->encloseArrayElementsInTags($content, "div");
        $html .= "</div>";
        return $html;

    }
    public function renderFooter(array $pageInfo): string
    {
        $html  = "<footer>";
        $html .= $this->encloseArrayElementsInTags($pageInfo, "div");
        $html .= "</footer>";
        return $html;
    }

    private function encloseArrayElementsInTags(array $content, string $tag): string
    {
        $html = "";
        foreach ($content as $key => $value) {
            // if key is non-numeric ("associative"), it gets added to the 
            // html string
            $html .= "<{$tag}>" . (!is_numeric($key) ? (mb_convert_case($key, MB_CASE_TITLE) . ": ") : "") . "${value}</{$tag}>";
        }
        return $html;
    }
}
