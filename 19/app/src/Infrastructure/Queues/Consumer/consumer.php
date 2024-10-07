<?php

use Slim\App;
use App\Infrastructure\Queues\Consumer\RabbitMQConsumer;

/** @var App $app */
$app = (require __DIR__ . '/../../../../config/bootstrap.php');

try {
    $consumer = $app->getContainer()->get(RabbitMQConsumer::class);
    $consumer->run();
} catch (Exception $e) {
    print_r($e->getMessage());
}
