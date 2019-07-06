<?php
declare(strict_types=1);

use harlequiin\Patterns\Bridge\XmlRenderer;
use PHPUnit\Framework\TestCase;

class XmlRendererTest extends TestCase
{
    public function setUp(): void
    {
        $this->renderer = new XmlRenderer();
    }

    public function testRenderHeader()
    {

        $expected = "<header>Dummy Title</header>";
        $result = $this->renderer->renderHeader("Dummy Title");

        $this->assertEquals(
            $expected,
            $result,
            "XmlRenderer::renderHeader didn't wrap the title in
             the correct <header... XML markup."
        );
    }

    public function testRenderList()
    {
        $expected = "<list><item>Key: value</item><item>Value</item></list>";
        $result = $this->renderer->renderList(["key" => "value", "Value"]);

        $this->assertEquals(
            $expected,
            $result,
            "XmlRenderer::renderHeader didn't wrap the values in 
             the correct <list><item>... XML markup. Values with associative
             keys should include uppercase Key."
        );
    }

    public function testRenderImage()
    {
        $expected = "<img src=\"url.com\" alt=\"\">";
        $result = $this->renderer->renderImage("url.com");

        $this->assertEquals(
            $expected,
            $result,
            "XmlRenderer::renderImage didn't wrap the source url
             int the correct <img src=... XML tag."
        );
    }

    public function testRenderContent()
    {
        $expected = "<content><paragraph>Post1</paragraph><paragraph>Post2</paragraph></content>";
        $result = $this->renderer->renderContent(["Post1", "Post2"]);

        $this->assertEquals(
            $expected,
            $result,
            "XmlRenderer::renderContent didn't wrap the values in the
             correct <div class=\"content\"><div>... XML markup"
         );
    }

    public function testRenderFooter()
    {
        $expected = "<footer><paragraph>Author: Māris Ūdris</paragraph></footer>";
        $result = $this->renderer->renderFooter(["author" => "Māris Ūdris"]);

        $this->assertEquals(
            $expected,
            $result,
            "XmlRenderer::renderFooter didn't wrap the values in the 
             correct <footer>... XML markup. Values with associative keys 
             should include uppercase Key."
        );
    }



}
