<?php
declare(strict_types=1);

namespace harlequiin\Patterns\AbstractFactory;

abstract class Book
{
    protected $currentPage;
    protected $pages;

    public function __construct(int $pages)
    {
        $this->currentPage = 0;
        $this->pages = $pages;
    }

    public function read()
    {
        echo 'Reading...';
    }

    public function turnPage(): int
    {
       return ++$this->currentPage;
    }
}
