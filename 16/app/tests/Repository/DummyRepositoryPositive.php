<?php

namespace app\tests\Repository;

use app\src\Infrastructure\Repository\SomeRepositoryInterface;

class DummyRepositoryPositive implements SomeRepositoryInterface
{
    public function setOrderIsPaid(string $orderNumber, float $sum): bool
    {
        return true;
    }
}
