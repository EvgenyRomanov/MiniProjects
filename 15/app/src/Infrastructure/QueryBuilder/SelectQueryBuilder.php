<?php

namespace app\src\Infrastructure\QueryBuilder;

use app\src\Infrastructure\Publisher\PublisherInterface;
use app\src\Infrastructure\QueryResult\DatabaseQueryResult;
use app\src\Infrastructure\QueryResult\DatabaseQueryResultProxy;
use Exception;

class SelectQueryBuilder
{
    private ?string $from = null;
    private ?string $where = null;
    private ?string $orderBy = null;
    private array $params = [];
    private PublisherInterface $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function from(string $table): SelectQueryBuilder
    {
        $this->from = "SELECT * FROM {$table} ";
        return $this;
    }

    public function where(string $field, string $value): SelectQueryBuilder
    {
        if (is_null($this->where)) {
            $this->where = "WHERE {$field} = ? ";
        } else {
            $this->where .= "AND {$field} = ? ";
        }

        $this->params[] = $value;

        return $this;
    }

    public function orderBy(string $field, string $direction): SelectQueryBuilder
    {
        $this->orderBy = "ORDER BY {$field} {$direction}";
        return $this;
    }

    /**
     * @throws Exception
     */
    public function execute(): DatabaseQueryResult
    {
        $query = $this->from . ($this->where ?? '') . ($this->orderBy ?? '');
        return new DatabaseQueryResultProxy($query, $this->params, $this->publisher);  // DatabaseQueryResult DatabaseQueryResultProxy
    }
}
