<?php
declare(strict_types=1);

use harlequiin\Patterns\Strategy\TextHandler;
use PHPUnit\Framework\TestCase;
use harlequiin\Patterns\Strategy\WriterStrategyInterface;

class TextHandlerTest extends TestCase
{
    public function testTextHandlersWriteMethodCallsStrategyMethod()
    {
        $textHandler = new TextHandler();
        $strategy = $this->createMock(WriterStrategyInterface::class); 
        $strategy->expects($this->once())
                 ->method('write')
                 ->with('text');

        $textHandler->setWriter($strategy);
        $textHandler->read('text');
        $textHandler->write();
    }
}
