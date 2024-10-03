<?php

namespace app\src\Application\UseCase;

use app\src\Application\UseCase\AbstractSearch;

class SearchByTitleCategory extends AbstractSearch
{
    public function __invoke($title, $category): array
    {
        return $this->bookRepository->searchByTitleCategory($title, $category);
    }
}
