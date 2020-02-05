<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

/**
 * Concrete Implementor.
 *
 * Implements the Implementor interface.
 * A (very) basic XML renderer based on an arbitrary DTD
 * by the author (me).
 */
class XmlRenderer implements RendererInterface
{
    public function renderHeader(string $title): string
    {
        return "<header>{$title}</header>";
    }

    public function renderImage(string $url): string
    {
        return "<img src=\"{$url}\" alt=\"\">";
    }

    public function renderList(array $content): string
    {
        $html  = "<list>";
        $html .= $this->encloseArrayElementsInTags($content, "item");
        $html .= "</list>";
        return $html;
    }

    public function renderContent(array $content): string
    {
        $html  = "<content>";
        $html .= $this->encloseArrayElementsInTags($content, "paragraph");
        $html .= "</content>";
        return $html;

    }
    public function renderFooter(array $pageInfo): string
    {
        $html  = "<footer>";
        $html .= $this->encloseArrayElementsInTags($pageInfo, "paragraph");
        $html .= "</footer>";
        return $html;
    }

    private function encloseArrayElementsInTags(array $content, string $tag): string
    {
        $html = "";
        foreach ($content as $key => $value) {
            // if key is non-numeric ("associative"), it gets added to the 
            // html string
            $html .= "<{$tag}>" .
                (!is_numeric($key) ?
                (mb_convert_case($key, MB_CASE_TITLE) . ": ") :
                "")
                . "${value}</{$tag}>";
        }

        return $html;
    }
}
