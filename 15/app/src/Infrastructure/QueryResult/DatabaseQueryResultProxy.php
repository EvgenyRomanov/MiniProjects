<?php

namespace app\src\Infrastructure\QueryResult;

use app\src\Infrastructure\Events\DatabaseQueryResultIsCreated;
use app\src\Infrastructure\Repository\Db;
use Exception;

class DatabaseQueryResultProxy extends DatabaseQueryResult
{
    public function __construct($query, $params, $publisher)
    {
        $this->db = Db::getInstance();
        $this->query = $query;
        $this->params = $params;
        $this->position = 0;
        $this->publisher = $publisher;

        $this->publisher->notify(new DatabaseQueryResultIsCreated($this));
    }

    /**
     * @throws Exception
     */
    public function rewind(): void
    {
        $this->executeQuery();
        parent::rewind();
    }
}
