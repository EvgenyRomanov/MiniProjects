<?php

namespace app\src\Application\UseCase;

use app\src\Application\UseCase\AbstractSearch;
use app\src\Domain\Repository\BookRepositoryInterface;

class SearchByTitle extends AbstractSearch
{
    public function __invoke($title): array
    {
        return $this->bookRepository->searchByTitle($title);
    }
}
