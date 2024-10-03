<?php

namespace app\src\Application\UseCase;

use app\src\Application\UseCase\AbstractSearch;

class SearchByTitleCategoryPriceAvailability extends AbstractSearch
{
    public function __invoke($title, $category, $price): array
    {
        return $this->bookRepository->searchByTitleCategoryPriceAvailability($title, $category, $price);
    }
}
