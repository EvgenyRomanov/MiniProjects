<?php

namespace app\src\Infrastructure\Repository;

use app\src\Domain\Entity\Status;
use app\src\Domain\Repository\StatusInterface;
use app\src\Domain\ValueObject\Name;
use app\src\Infrastructure\DataMapper\StatusMapper;
use Exception;

class RepositoryStatusDb implements StatusInterface
{
    private StatusMapper $mapper;

    /**
     * @throws Exception
     */
    public function __construct(StatusMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @throws Exception
     */
    public function findByName(Name $name): ?Status
    {
        return $this->mapper->findByName($name->getValue());
    }
}
