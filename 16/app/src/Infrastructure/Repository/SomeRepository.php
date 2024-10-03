<?php

namespace app\src\Infrastructure\Repository;

class SomeRepository implements SomeRepositoryInterface
{
    public function setOrderIsPaid(string $orderNumber, float $sum): bool
    {
        //TODO
        return true;
    }
}
