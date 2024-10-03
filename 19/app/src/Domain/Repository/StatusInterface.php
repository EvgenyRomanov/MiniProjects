<?php

namespace app\src\Domain\Repository;

use app\src\Domain\Entity\Status;
use app\src\Domain\ValueObject\Name;

interface StatusInterface
{
    public function findByName(Name $name): ?Status;
}
