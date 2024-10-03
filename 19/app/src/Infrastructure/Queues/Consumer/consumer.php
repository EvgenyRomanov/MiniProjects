<?php

use app\src\Infrastructure\DataMapper\{StatusMapper};
use app\src\Infrastructure\DataMapper\ApplicationFormMapper;
use app\src\Infrastructure\Queues\Consumer\RabbitMQConsumer;
use app\src\Infrastructure\Repository\RepositoryApplicationFormDb;
use app\src\Infrastructure\Repository\RepositoryStatusDb;

require_once __DIR__ . '/../../../../vendor/autoload.php';

try {
    $repositoryApplication = new RepositoryApplicationFormDb(new ApplicationFormMapper());
    $repositoryStatus = new RepositoryStatusDb(new StatusMapper());

    $consumer = new RabbitMQConsumer($repositoryApplication, $repositoryStatus);
    $consumer->run();
} catch (Exception $e) {
    print_r($e->getMessage());
}
