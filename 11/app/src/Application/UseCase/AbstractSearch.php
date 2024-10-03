<?php

namespace app\src\Application\UseCase;

use app\src\Domain\Repository\BookRepositoryInterface;

abstract class AbstractSearch
{
    protected BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
}
