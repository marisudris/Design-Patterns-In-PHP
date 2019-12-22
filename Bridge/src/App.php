<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Bridge;

/**
 * Client.
 *
 * Pairs our Page abstracions with Renderer implementors
 * and uses them.
 */
class App
{
    public function runHtml(array $content)
    {
        $page = new ProfilePage(new HtmlRenderer(), $content);
        $page->render();
    }

    public function runXml(array $content)
    {
        $page = new TimelinePage(new XmlRenderer(), $content);
        $page->render();
    }
}
