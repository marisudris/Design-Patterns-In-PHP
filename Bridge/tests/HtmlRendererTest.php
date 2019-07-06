<?php
declare(strict_types=1);

use harlequiin\Patterns\Bridge\HtmlRenderer;
use PHPUnit\Framework\TestCase;

class HtmlRendererTest extends TestCase
{
    public function setUp(): void
    {
        $this->renderer = new HtmlRenderer();
    }

    public function testRenderHeader()
    {

        $expected = "<head><meta charset=\"utf-8\"><title>Dummy Title</title></head>";
        $result = $this->renderer->renderHeader("Dummy Title");

        $this->assertEquals(
            $expected,
            $result,
            "HtmlRenderer::renderHeader didn't wrap the title in
             the correct <head><title>... HTML markup."
        );
    }

    public function testRenderList()
    {
        $expected = "<ul><li>Key: value</li><li>Value</li></ul>";
        $result = $this->renderer->renderList(["key" => "value", "Value"]);

        $this->assertEquals(
            $expected,
            $result,
            "HtmlRenderer::renderHeader didn't wrap the values in 
             the correct <ul><li>... HTML markup. Values with associative
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
            "HtmlRenderer::renderImage didn't wrap the source url
             int the correct <img src=... HTML tag."
        );
    }

    public function testRenderContent()
    {
        $expected = "<div class=\"content\"><div>Post1</div><div>Post2</div></div>";
        $result = $this->renderer->renderContent(["Post1", "Post2"]);

        $this->assertEquals(
            $expected,
            $result,
            "HtmlRenderer::renderContent didn't wrap the values in the
             correct <div class=\"content\"><div>... HTML markup"
         );
    }

    public function testRenderFooter()
    {
        $expected = "<footer><div>Author: Māris Ūdris</div></footer>";
        $result = $this->renderer->renderFooter(["author" => "Māris Ūdris"]);

        $this->assertEquals(
            $expected,
            $result,
            "HtmlRenderer::renderFooter didn't wrap the values in the 
             correct <footer><div>... HTML markup. Values with associative keys 
             should include uppercase Key."
        );
    }



}

interface RendererInterface
{
    public function renderHeader(string $title): string;
    public function renderList(array $content): string;
    public function renderImage(string $url): string;
    public function renderContent(array $content): string;
    public function renderFooter(array $pageInfo): string;
}
