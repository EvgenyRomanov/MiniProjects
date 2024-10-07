<?php

namespace App\Infrastructure\Events;

use App\Infrastructure\QueryResult\DatabaseQueryResult;

abstract class AbstractEventWithQueryResult extends AbstractEvent
{
    protected DatabaseQueryResult $queryResult;

    public function __construct(DatabaseQueryResult $queryResult)
    {
        $this->queryResult = $queryResult;
    }

    public function __toString(): string
    {
        return static::class;
    }
}
