<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Strategy;

/**
 * Context object.
 *
 * Delegates to the WriterStrategy object.
 */
class TextHandler
{
    /**
     * @var string
     */
    private $data;
    /**
     * @var WriterStrategy
     */
    private $textWriter;

    public function read(string $data): void
    {
        $this->data = $data;
    }

    public function write(): string
    {
        // default behavior w/o writing strategy set
        if (!isset($this->textWriter)) {
            return $this->data;
        }
        return $this->textWriter->write($this->data);
    }

    public function setWriter(WriterStrategy $writer): void
    {
        $this->textWriter = $writer;
    }
}
